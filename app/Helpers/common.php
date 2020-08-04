<?php
	function sanitizer(String $str)
    {
        //returns string that is sanitize
        //dd(strip_tags(htmlspecialchars('<script>JavaScript</script>')));
        return strip_tags(htmlspecialchars($str));
    }
?>