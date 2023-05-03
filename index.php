<?php require_once 'config.php'; session_start();

  if (!isset($_SESSION['access_token'])) {
    header("Location: login.php");
    exit;
  }

  $page_number = (!isset($_GET['p'])) ? 1 : $_GET['p'];
  $per_page    = 10;



  $endpoint = "https://api.github.com/repos/".OWNER."/".REPO."/issues?per_page={$per_page}&page={$page_number}";
  $access_token = $_SESSION['access_token'];

  
  
  $ch = curl_init($endpoint);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Authorization: Bearer ' . $access_token,
      'User-Agent: DDN'
  ));
  $result = curl_exec($ch);
  curl_close($ch);

  $issues = json_decode($result, true);

  function getLabel($issue, $_label)
  {
    if (!count($issue['labels'])) {
      return "";
    }

    $lbl = "";
    foreach ($issue['labels'] as $label) {
      $type = explode(":", $label["name"]);
      if (strtolower($type[0]) == $_label) {
        $lbl = trim($type[1]);
        break;
      }
    }
    return $lbl;
  }

  $next = (count($issues) < $per_page) ? $page_number : $page_number + 1;
  $prev = ($page_number == 1) ? $page_number : $page_number - 1;

?>
<?php require_once('partials/header.php'); ?>
  <?php require_once('partials/new-issue-modal-form.php'); ?>
  <div class="row">
    <div class="col-sm-8 pt-5">
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#issueModalForm">
        CREATE NEW ISSUE
      </button>
      <table class="table table-striped table-bordered mt-4">
        <thead>
          <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Description/Body</th>
            <th scope="col">Client</th>
            <th scope="col">Priority</th>
            <th scope="col">Type</th>
            <th scope="col">Assigned To</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($issues as $issue): ?>
            <tr>
              <th scope="row"><?= $issue['number'] ?></th>
              <td><?= $issue['title'] ?></td>
              <td><?= $issue['body'] ?></td>
              <td><?= getLabel($issue, "c") ?></td>
              <td><?= getLabel($issue, "p") ?></td>
              <td><?= getLabel($issue, "t") ?></td>
              <td><?= ($issue['assignee'] != NULL) ? $issue['assignee']["login"] : "" ?></td>
              <td><?= $issue['state'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="?p=<?= $prev ?>">Previous</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="?p=<?= $next ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
<?php require_once('partials/footer.php'); ?>


