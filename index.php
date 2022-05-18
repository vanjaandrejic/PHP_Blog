<?php
    require('config/config.php');
    require('config/db.php');

    // Create Query
    $query = 'SELECT * FROM posts ORDER BY created_at DESC';

    // Get the results
    $result = mysqli_query($conn, $query);

    // Fetch Data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($posts);

    // Free Result
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

?>

    <?php include('inc/header.php'); ?>
    <div class="container">
    <h1>Posts</h1>
    <hr>
    <?php foreach($posts as $post) : ?>
        <div class="well bg-light mt-2 mb-2">
            <h3>
                <?php echo $post['title']; ?>
            </h3>
            <small>
                Created at <?php
                    echo $post['created_at']; 
                ?>
                by <?php echo $post['author']; ?>
            </small>
            <p><?php echo $post['body']; ?></p>
            <a class="btn btn-success m-2" href="<?php echo ROOT_URL;
            ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
        </div>
        <?php endforeach; ?>
        <hr>
        </div>
    <?php include('inc/footer.php'); ?>