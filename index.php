<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>PropertyGuru - View Logs</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/log.css">
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/sendRequest.js"></script>
    </head>
    <body>
        <div class="container col-md-6">
            <h2 class="logs-head">File: Logs View</h2>
            <div class="loading-div"><img src="ajax-loader.gif"></div>
            <div class="row">
                <div>
                    <div class="input-group my-group">
                        <input type="text" class="form-control" id="pathToFile" name="pathToFile" placeholder="Enter path/to/file">
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="viewLogFileBtn" type="submit">View</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <div id="results"><!-- content will be loaded here --></div>
                </div>
            </div>
        </div>
    </body>
</html>
