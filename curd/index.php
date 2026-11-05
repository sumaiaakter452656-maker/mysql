<?php 
include_once("dbconfig.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Student list</h3>
    <a href="./student_new.php">new enty</a><br><br>

    <?php
    $perPage = 20;
    $countResult = $conn->query("SELECT COUNT(*) AS total FROM students");
    $totalStudents = (int) $countResult->fetch_assoc()['total'];
    $totalPages = max(1, (int) ceil($totalStudents / $perPage));

    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    $page = ($page !== false && $page !== null && $page > 0) ? $page : 1;
    $page = min($page, $totalPages);
    $offset = ($page - 1) * $perPage;

    $statement = $conn->prepare("SELECT * FROM students ORDER BY id LIMIT ? OFFSET ?");
    $statement->bind_param("ii", $perPage, $offset);
    $statement->execute();
    $rawData = $statement->get_result();
    ?>

<table border="1" >
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>email</th>
        <th>address</th>
        <th>phone</th>
        <th>action</th>
    </tr>

    <?php
    while($row = $rawData->fetch_assoc()){?>
   
    
    
    <tr>
        <td><?php echo $row ['id']?></td>
        <td><?php echo $row ['name']?></td>
        <td><?php echo $row ['email']?></td>
        <td><?php echo $row ['address']?></td>
        <td><?php echo $row ['phone']?></td>

        <td class="action">
            <a class="icon-btn" title="Edit" href="./student_edit.php?id=<?php echo $row ['id']?>">✏️</a>
            <a class="icon-btn danger" title="Delete student" onclick="return confirm('are you sure to delete')" href="./delete.php?id=<?php echo $row ['id']?>">🗑️</a>
        </td>
    </tr>
   
    <?php } ?>

     </table>

    <nav class="pagination" aria-label="Student list pages">
        <a
            class="page-link<?php echo $page <= 1 ? ' disabled' : ''; ?>"
            href="?page=<?php echo max(1, $page - 1); ?>"
            <?php echo $page <= 1 ? 'aria-disabled="true" tabindex="-1"' : ''; ?>
        >Previous</a>

        <?php for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) { ?>
            <a
                class="page-link<?php echo $pageNumber === $page ? ' active' : ''; ?>"
                href="?page=<?php echo $pageNumber; ?>"
                <?php echo $pageNumber === $page ? 'aria-current="page"' : ''; ?>
            ><?php echo $pageNumber; ?></a>
        <?php } ?>

        <a
            class="page-link<?php echo $page >= $totalPages ? ' disabled' : ''; ?>"
            href="?page=<?php echo min($totalPages, $page + 1); ?>"
            <?php echo $page >= $totalPages ? 'aria-disabled="true" tabindex="-1"' : ''; ?>
        >Next</a>
    </nav>
</body>
</html>