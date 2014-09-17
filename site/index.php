<!DOCTYPE html>
<html lang="en">

<head>
	<title>Portfolio of Will J Woodward</title>
	<style>
		/* Custom fonts */
		@import url('http://fonts.googleapis.com/css?family=Delius+Swash+Caps');
		@import url('http://fonts.googleapis.com/css?family=Lobster');

		/* FTW!!! */
		* { box-sizing: border-box; }

		/* Block elements */
		body {						margin: 0; background: #CDFFFF; color: #400D12; font-family: 'Delius Swash Caps', Helvetica, sans-serif; min-height: 100%; }
		header, section, footer {	display: block; }
		section > p, footer > p {	display: none; }
		ul {						text-align: center; padding: 0; list-style: none; margin: 0; }

		/* Inline elements */
		a {	text-decoration: none; color: inherit; }

		/* Header */
		header {	box-shadow: 0 0 10px #880000; padding: 3em 0; background-color: #DD0000; font-family: Lobster, serif; text-align: center; }
		header h1 {	font-weight: normal; font-size: 5em; margin: 0; color: white; text-shadow: 1px 1px 0 black, 2px 2px 0 black, 3px 3px 0 black, 4px 4px 0 black; }
		header h2 {	font-weight: normal; font-size: 2em; color: #300; text-shadow: 1px 1px 0px #f88; }

		/* Section */
		section {					padding: 2em; text-transform: lowercase; }
		section li {				display: inline-block; margin: 0 2em; padding: 1.5em; vertical-align: top; border-radius: 2em; -webkit-transition: 0.2s; }
		section li a {				display: block; width: 200px; }
		section li img {			border-radius: 1em; box-shadow: 0 0 10px black; -webkit-transition: 0.3s; }
		section li a:hover img {	box-shadow: 0 0 30px black; }
		section li h3 {				color: #400D12; text-shadow: 1px 1px 1px white; margin-bottom: 0; text-decoration: underline; }
		section li p {				margin-top: 0.25em; margin-bottom: 0; }

		/* Footer */
		footer {				position: static; bottom: 0; background-color: #4FD5D6; padding: 2em 0; box-shadow: 0 0 10px #1F7576; }
		footer li#twitter a {	display: inline-block; background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAWCAYAAAChWZ5EAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAZpJREFUeNqt1r9rE2EcwOFLqfTH2FhLB60INaAOxaF0KA4FiYM4uJQqOAj6Bzh0dRAR0bGCi4hFnQrdil1aVDpoBSMdHBRRHASpiErRUvR8FkFCXt73kvvAAyG8l7xwx/u9Sp7nWYkd4BQTbNLgDsE/6aasRliiRs46a+QE66K53ZxmgNR2cZ8amX6QaS/7CecWNKvykw9c4xBZxCyhPnMmdG3oB2/zry0WmAysHWaTWDNFNtDLPbb5vxVONK29SkrfqKVuYJBLvKNVC1Tp4xOp3UrdwCixnnOZIr1uvn3Bc0CzXKfMfrPCDgPMxZ7u4zQosz8sUyd6EE0wTJlVGOIcvd2RhTvsoaxyFvnIYx6lzII600wxQie94WDRWbDMBi/otKXALIg2VMKz8J25VhvoJ9ZLxnhIu13hbasNjDJND6F6GOcY7XSXm6H3gVcc5QnzrPOVCoOMc54jtNMDLqaM4xl+kWsbnzvuBhWy1HF8mFU6bYOTZDGtvuziLGsU7RkX6CdLETuIJqkzxj6q9JGzxRfe02CVpxTqL9bJMnVkOBb2AAAAAElFTkSuQmCC') no-repeat left center; padding-left: 35px; min-height: 22px; color: white; text-shadow: 1px 1px 1px #400D12; }
		footer a:hover {		text-decoration: underline; }
	</style>
</head>

<body>

<header>
	<h1>willjw.co.uk</h1>
	<h2>Portfolio of Will J Woodward</h2>
</header>

<section>
	<p>Projects:</p>

	<ul>
		<li>
			<a href="http://statsfc.com" target="_blank">
				<img src="/i/statsfc.png" alt="StatsFC.com logo" width="150" height="150">
				<h3>Stats FC</h3>
				<p>Football widgets with a difference</p>
			</a>
		</li>
		<li>
			<a href="/getdatauri" target="_blank">
				<img src="/i/getdatauri.png" alt="GetDataURI.com logo" width="150" height="150">
				<h3>Get Data URI</h3>
				<p>Convert images to data-URI's</p>
			</a>
		</li>
		<!--
		<li>
			<a href="http://placeape.com" target="_blank">
				<img src="/i/placeape.png" alt="PlaceApe.com logo">
				<h3>PlaceApe</h3>
				<p>Placeholder images of apes</p>
			</a>
		</li>
		-->
	</ul>
</section>

<footer>
	<p>Contact:</p>

	<ul>
		<li id="twitter"><a href="http://twitter.com/willjw" target="_blank">@willjw</a></li>
	</ul>
</footer>

</body>

</html>
