<?php
    $ip = $_SERVER["REMOTE_ADDR"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My IP Tracker</title>
</head>
<body style="margin:0px;box-sizing:border-box;">
    <div style="width:100vw;height:100vh;display:flex;cursor:pointer;justify-content:center;align-items:center;" onclick="copyIp('<?php echo $ip; ?>')">
        <h1 style="font-size:13vw;text-align:center;margin-top:-30px;"><?php echo $ip; ?></h1>
    </div>

    <script>
        function copyIp(text) {
            if (navigator.clipboard !== undefined) {
                // Using ClipBoard API (HTTPS)
                navigator.clipboard.writeText(text).then(() => {
                    alert("✅ Copied!");
                }).catch((error) => {
                    alert("❌ Copy Failed! Please Contact Site's Administrator.");
                });
            } else {
                // Using execCommand (HTTP)
                const textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                textArea.setSelectionRange(0, 99999);
                try {
                    document.execCommand("copy");
                } catch (error) {
                    alert("❌ Copy Failed! Please Contact Site's Administrator.");
                }
                textArea.setSelectionRange(0, 0);
                document.body.removeChild(textArea);
                alert("✅ Copied!");
            }
        }
    </script>
</body>
</html>