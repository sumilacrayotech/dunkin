<?php 
$agent = $_SERVER['HTTP_USER_AGENT'];
if (strlen(strstr($agent, 'Firefox')) > 0) {?>
<style type="text/css">
.moxie-shim.moxie-shim-html5{position: static!important;height: 0px!important;}
.moxie-shim.moxie-shim-html5 input[type=file]{width: 50%!important;}
</style>    
<?php }?>
<div id="example" style="width: 92%;">
    <div id="uploader">
        <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
    </div>
</div>