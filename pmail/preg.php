
<?php
// The \\2 is an example of backreferencing. This tells pcre that
// it must match the second set of parentheses in the regular expression
// itself, which would be the ([\w]+) in this case. The extra backslash is
// required because the string is in double quotes.
$html = "<b>bold text</b><a href=howdy>click me</a>";

preg_match_all("/(<([\w]+)[^>]*>)(.*?)(<\/\\2>)/", $html, $matches, PREG_SET_ORDER);

foreach ($matches as $val) {
    echo "matched: " . $val[0] . "<br>";
    echo "part 1: " . $val[1] . "<br>";
    echo "part 2: " . $val[2] . "<br>";
    echo "part 3: " . $val[3] . "<br>";
    echo "part 4: " . $val[4] . "<br>";
	echo "<br>";
}
/*
matched: <b>bold text</b>
part 1: <b>
part 2: b
part 3: bold text
part 4: </b>

matched: <a href=howdy>click me</a>
part 1: <a href=howdy>
part 2: a
part 3: click me
part 4: </a>
*/
?>
