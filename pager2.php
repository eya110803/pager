<?php
$page_num = 10;            // 最大表示ページ数
$page_end = $page_num - 1; // 末ベージ数計算用
$page_pos = 5;             // 該当ページ表示位置
$limit    = 3;             // 1ページの表示件数

$pos = 14;                 // 現在のページ番号
$count = 41;               // データ総数

$page_max = ceil($count / $limit); // 最大ページ数

$min = 0;                   // 開始ページ
$max = 0;                   // 最大ページ数

// 開始ページの計算
if ($page_max <= $page_num) {
    $min = 1;
} else {
    $min = (($pos - $page_pos) > 1)? $pos - $page_pos : 1;
    // 終了ページが最大超になる場合
    if ($min + $page_end > $page_max) {
        $min = $page_max - $page_end;
    }
}

// 末ページの計算
$max = ($page_max <= $page_num)? $page_max : $min + $page_end;

$prev = ($pos - 1 < $min) ? -1 : $pos - 1;
$next = ($pos + 1 > $max) ? -1 : $pos + 1;
$offset = ($pos - 1) * $limit;
?>

<div>
$limit = <?php echo $limit; ?><br/>
$min = <?php echo $min; ?><br/>
$max = <?php echo $max; ?><br/>

$pos = <?php echo $pos; ?><br/>
$prev = <?php echo $prev ; ?><br/>
$next = <?php echo $next; ?><br/>

$page_max = <?php echo $page_max; ?><br/>
$offset = <?php echo $offset; ?><br/>
</div>

<!--| pager BGN |-->
<div class="pager">
<ul class="inline-list">

<?php if ($pos > 1): ?>
<li class="first"><a href="/page/1">|&lt; 先頭へ</a></li>
<li class="prev"><a href="/page/<?= ($prev) ?>">&lt; 前へ</a></li>
<?php endif; ?>


<?php for($min; $min <= $max; $min++): ?>
<li <?= ($min == $pos)? 'class="current" style="color: red;"' : '' ?>><a href="/page/<?= ($min) ?>"><?= $min ?></a></li>
<?php endfor; ?>

<?php if ($page_max > $pos): ?>
<li class="next"><a href="/page/<?= ($next) ?>">次へ &gt;</a></li>
<li class="last"><a href="/page/<?= ($page_max) ?>">最後へ &gt;|</a></li>
<?php endif; ?>
</ul>
</div>
<!--| pager END |-->
