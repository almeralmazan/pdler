<html>
<head>
	<title>Sample</title>
	<script type="text/javascript" src="../public/js/protos.js"></script>
	<script type="text/javascript">
		var request;

		function init() {
			request = new protos.net.NetRequest();
			request.bind("complete",  null , requestComplete );
			request.load("http://pdslim.dev/trucks", "POST", { } );
		}

		function requestComplete(e) { console.log(request.data); }
	</script>
</head>
<body onload="init()"></body>
</html>