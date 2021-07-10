<?php
$meta = [];
$updateDateBits = explode(" ", $article['updateDate']);
$meta['pageGenDate'] = $updateDateBits[0] . 'T' . $updateDateBits[1] . 'Z';
$meta['siteSubject'] = str_replace('"', '＂', $article['title']);
$meta['siteDescription'] = str_replace('"', '＂', mb_substr($article['body'], 0, 100));
$meta['siteDescription'] = str_replace("\n", "", $meta['siteDescription']);
$pageTitleIcon = '<i class="fas fa-newspaper"></i>';
$pageTitle = "게시물 상세내용, ${id}번 게시물";

$body = ToastUiEditor__getSafeSource($article['body']);

$utterancPageIdentifier = "/usr/article/detail?id={$article['id']}";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<section class="section-article-detail">
  <div class="container mx-auto">
    <div class="con-pad">
      <div>
        <a href="list" class="btn btn-link">리스트</a>
        <a href="modify?id=<?=$article['id']?>" class="btn btn-link">수정</a>
        <a onclick="if ( confirm('정말 삭제 하시겠습니까?') == false ) return false;" href="doDelete?id=<?=$article['id']?>" class="btn btn-link">삭제</a>
      </div>

      <hr>
      
      <div class="mt-4">
        <div>
          <div class="badge badge-primary badge-outline">번호</div>
          <?=$article['id']?>
        </div>
        <div class="mt-2">
          <div class="badge badge-primary badge-outline">제목</div>
          <?=$article['title']?>
        </div>
        <div class="mt-2">
          <div class="badge badge-primary badge-outline">작성자</div>
          <?=$article['extra__writerName']?>
        </div>
        <div class="mt-2">
          <div class="badge badge-primary badge-outline">작성날짜</div>
          <?=$article['regDate']?>
        </div>
        <div class="mt-2">
          <div class="badge badge-primary badge-outline">수정날짜</div>
          <?=$article['updateDate']?>
        </div>
        <div class="mt-2">
          <script type="text/x-template"><?=$body?></script>
          <div class="toast-ui-viewer"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-disqus">
  <div class="container mx-auto">
    <div class="con-pad">
      <style>
      .utterances {
        max-width: 100%;
      }
      </style>
      <script src="https://utteranc.es/client.js"
        repo="jhs512/github.com-jhs512-php_blog_2021_deployment_3rd"
        issue-term="<?=$utterancPageIdentifier?>"
        theme="github-light"
        crossorigin="anonymous"
        async>
      </script>
    </div>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>