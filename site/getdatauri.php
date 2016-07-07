<!DOCTYPE html>
<html lang="en">

<head>
    <title>Image to Data URI converter | GetDataURI.com</title>
    <meta charset="utf8">
    <style>
        /* Custom fonts */
        @import url('https://fonts.googleapis.com/css?family=Trochut:700');
        @import url('https://fonts.googleapis.com/css?family=Pontano+Sans');

        /* Border box sizing FTW!!! */
        * { box-sizing: border-box; }

        /* Layout */
        body {          background: #f0f0f0 url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkAQMAAABKLAcXAAAABlBMVEXo6Ojw8PBI2qWYAAAAsUlEQVR4Xu3NsRGCQBgFYRkCQuyAFuyAluwAS7MUSyA0cMS399/MVmDGZl+0l2o9aO/aml5dQXoWhtKjNJYCmhq+XXPTp2tpev9nd+7OHXJ3jdzdInf3yN1eqt0QuRsjd1Pkbo7cLZG7NXK3Re6OyB1yh9whd8gdcofcIXeRO+QOuUPukDvkDrlD7pA75A65Q+6QO+QOuUPukDvkDrlD7pA75A65Q+6QO+QOuUPukLvoBwMnhKcnR6obAAAAAElFTkSuQmCC'); color: #222; font-family: 'Pontano Sans', Helvetica, sans-serif; }
        div#container { margin: 0 auto; width: 800px; }

        /* General elements */
        h1 {      font-family: 'Trochut', Helvetica, sans-serif; font-size: 5em; margin: .3em 0 .5em 0; text-align: center; text-shadow: 1px 1px 0 #f0f0f0, 2px 2px 0 #f0f0f0, 5px 5px 10px #aaa; }
        h1 a {    border: none; color: inherit; }
        p {       font-size: 1.5em; text-align: center; }
        a {       border-bottom: 1px dotted #222; color: black; text-decoration: none; }
        a:hover { border-color: #f06015; color: #f06015; }
        pre {     background: #e8e8e8; border: 1px dashed #222; line-height: 1.5em; max-height: 12.5em; overflow: auto; padding: .25em .5em; word-wrap: break-word; }
        img {     max-width: 800px; }

        /* Form */
        form {               text-align: center; }
        label {              background: #f78d1d; background-image: linear-gradient(top, #faa51a, #f47a20); border: solid 1px #da7c0c; border-radius: .5em; box-shadow: 0 1px 2px rgba(0,0,0,.2); color: #fef4e9; cursor: pointer; display: inline-block; outline: none; padding: .25em 1.5em .3em; text-align: center; text-decoration: none; text-shadow: 0 1px 1px rgba(0,0,0,.3); }
        label:hover {        background: #f47c20; background-image: linear-gradient(top, #f88e11, #f06015); text-decoration: none; }
        label:active {       background-image: linear-gradient(top, #f47a20, #faa51a); color: #fcd3a5; position: relative; top: 1px; }
        input {              font: inherit; }
        input[type="file"] { left: 0; position: absolute; top: 0; visibility: hidden; }
    </style>
    <script src="/j/prefixfree.min.js"></script>
</head>

<body>
    <div id="container">
        <h1><a href="/getdatauri">Image → Data URI</a></h1>

        <form action="/getdatauri" method="post" enctype="multipart/form-data">
            <p>
                <label for="image">Choose an image</label>
                <input type="file" name="image" id="image" accept="image/gif,image/jpg,image/jpeg,image/png">
            </p>

            <p><input type="submit" value="Convert"></p>
        </form>

        <?php
        if (isset($_FILES['image'])) {
        ?>
            <section>
                <?php
                try {
                    $allowed = array(
                        'image/gif',
                        'image/jpg',
                        'image/jpeg',
                        'image/png'
                    );

                    if (! in_array($_FILES['image']['type'], $allowed)) {
                        throw new Exception('Only PNG, JPG or GIF images please ☺');
                    }

                    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                        throw new Exception('There was a problem uploading your file ☹');
                    }

                    if (! file_exists($_FILES['image']['tmp_name']) || ! is_readable($_FILES['image']['tmp_name'])) {
                        throw new Exception('There was a problem reading your file ☹ Please try again.');
                    }

                    $size = round($_FILES['image']['size'] / 1024);

                    if ($size > 250) {
                        $sizeText = ($size < 512 ? round($size) . ' Kb' : round($size / 1024, 1) . ' Mb');

                        if ($size > 1024) {
                            throw new Exception('Your image is ' . $sizeText . '; not very suitable for a data URI ☹');
                        }

                        echo '<p>Your image is ' . $sizeText . ', maybe a bit too big for a data URI.</p>' . PHP_EOL;
                    }

                    $contents    = file_get_contents($_FILES['image']['tmp_name']);
                    $base64        = base64_encode($contents);
                    $uri        = 'data:' . $_FILES['image']['type'] . ';base64,' . $base64;

                    echo '<pre>' . $uri . '</pre>' . PHP_EOL;

                    if ($size > 32) {
                        echo '<p class="warning"><a href="http://en.wikipedia.org/wiki/Data_URI_scheme#Disadvantages">IE8 and below will have trouble displaying your image</a> using a data URI.</p>' . PHP_EOL;
                    }
                } catch (Exception $e) {
                    echo '<p class="error">' . $e->getMessage() . '</p>' . PHP_EOL;
                }
                ?>
            </section>
        <?php
        }
        ?>
    </div>

    <script src="/j/jquery-1.7.2.min.js"></script>
    <script>
        $(function() {
            // Hide submit button.
            $('input:submit').hide();

            // Submit the form once an image is selected.
            $('input#image').change(function() {
                $('form').submit();
            });

            // Display the image using the data URI.
            var $pre = $('pre');
            if ($pre.length > 0) {
                $('section').append($('<p>').append($('<img>').attr('src', $pre.text())));
            }

            // Pre-select the data URI.
            $('pre').click(function() {
                $(this).selectText();
            });

            // Workaround for Firefox not triggering file input on label click.
            if ($.browser.mozilla) {
                $('label').click(function() {
                    $('input[type=file]').click();
                });
            }
        });

        // Credit where it's due:
        // - http://stackoverflow.com/questions/985272#987376
        // - http://jsfiddle.net/KcX6A/570/
        $.fn.selectText = function(){
            var    doc        = document,
                element    = this[0];

            if (doc.body.createTextRange) {
                var range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                var selection = window.getSelection();
                var range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        };
    </script>
</body>

</html>
