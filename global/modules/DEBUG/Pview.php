<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server error | 500</title>
    <link rel="stylesheet" href="style.css">
</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap');

body {
    font-family: 'Montserrat', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #3067D4;
    color: #ffffff;
}

.main {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.title__404 {
    font-weight: 900;
    font-size: 150px;
}

.subtitle__404 {
    font-size: 20px;
    max-width: 70%;
    text-align: center;
}

.return {
    text-decoration: none;
    color: #ffffff;
    margin-top: 50px;
    padding: 20px;
    background-color: #78a5fd;
    border-radius: 30px;

    transition: .1s ease;
}

.return:hover {
    background-color: #0aa1f1;
}
</style>
<script type="text/javascript">
    function home(){
        var host = window.location.protocol + "//" + window.location.host;
        window.location.href = host;
    }
</script>
<body>
    <div class="main">
        <div class="title__404">500</div>
        <div class="subtitle__404">An unforeseen error occurred on the server</div>
    </div>
</body>
</html>