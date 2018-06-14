<?php

function get_page() {
  $CI =& get_instance();
  $page = $CI->input->get("page");
  if (empty($page)) { $page = 1; }
  return $page;
}

function sluggify($str) {
  return str_replace("?","",str_replace("!","", str_replace(".","",str_replace(" ", "-", strtolower($str)))));
}
function display_paging_blogs($paging) {
  if ($paging["total"] > 0) {
    echo '<ul class="pagination">
          <li> <a href="/blog/posts/1"><<</a> </li>';
    foreach($paging["pages"] as $pagenb) {
      echo '<li ';
      if ($pagenb==$paging["page"]) { echo ' class="active" '; }
      echo '> <a href="/blog/posts/'.$pagenb.'">'.$pagenb.'</a> </li>';
    }
    echo '<li> <a href="/blog/posts/'.$paging["nbpages"].'">>></a> </li>
    </ul>';
  }
}

function display_paging($paging) {
  if ($paging["total"] > 0) {
    echo '<ul class="pagination">
          <li> <a href="?page=1"><<</a> </li>';
    foreach($paging["pages"] as $pagenb) {
      echo '<li ';
      if ($pagenb==$paging["page"]) { echo ' class="active" '; }
      echo '> <a href="?page='.$pagenb.'">'.$pagenb.'</a> </li>';
    }
    echo '<li> <a href="?page='.$paging["nbpages"].'">>></a> </li>
    </ul>';
  }
}

function generate_paging($page, $total) {
  $nbpages = ceil($total / 5);
  if (empty($page)) { $page = 1; }
  if ($page > $nbpages) { $page = $nbpages; }
  $pages = array();
  for ($x=4;$x>=1;$x--) { $p = $page - $x; if ($p>0) { $pages[]=$p; } }
  $pages[]=$page;
  for ($x=1;$x<=4;$x++) { $p = $page + $x; if ($p<=$nbpages) { $pages[]=$p; } }
  return array(
    "pages"=>$pages,
    "page"=>$page,
    "total"=>$total,
    "nbpages"=>$nbpages
  );
}

function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}
