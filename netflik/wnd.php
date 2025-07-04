<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #111;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .container {
      max-width: 1200px;
      margin: 20px;
      text-align: center;
    }
    .movie-info {
      margin-top: 30px;
      background-color: #222;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(255, 0, 0, 0.8);
      display: flex;
    }
    .poster {
      width: 200px;
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
    }
    .details {
      margin-left: 30px;
      flex: 1;
    }
    .title {
      font-size: 36px;
      margin-bottom: 20px;
      color: #ff0000;
      text-align: left;
    }
    .rating {
      margin-top: 15px;
      font-size: 18px;
      color: #fff;
      text-align: left;
    }
    .stars {
      color: #ffcc00;
    }
    .description {
      margin-top: 20px;
      font-size: 18px;
      color: #ddd;
      text-align: left;
    }
    .additional-info {
      margin-top: 20px;
      font-size: 16px;
      color: #bbb;
      text-align: left;
    }
  </style>
</head>
<body>
<?php
include("db.php");

// Fungsi konversi URL
function convertToEmbedUrl($url) {
    if (strpos($url, "youtu.be") !== false) {
        $video_id = substr(parse_url($url, PHP_URL_PATH), 1);
        return "https://www.youtube.com/embed/" . $video_id;
    }
    if (strpos($url, "youtube.com") !== false) {
        parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
        if (isset($queryParams['v'])) {
            return "https://www.youtube.com/embed/" . $queryParams['v'];
        }
    }
    return $url;
}

// Ambil ID film dari query string
$id_cartoons = isset($_GET['id_cartoons']) ? $_GET['id_cartoons'] : null;

// Periksa apakah ID film ada
if ($id_cartoons) {
    $query = "SELECT * FROM cartoons WHERE id_cartoons = ?";
    $stmt = $dbb->prepare($query);
    $stmt->bind_param("i", $id_cartoons);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cartoons = $result->fetch_assoc();
        ?>
        <div class="container">
            <h3>Watch Trailer</h3>
            <iframe 
                width="560" 
                height="315" 
                src="<?php echo convertToEmbedUrl($cartoons['url_video']); ?>" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
            <div class="movie-info">
                <img src="<?php echo htmlspecialchars($cartoons['foto']); ?>" alt="Poster" class="poster" onerror="this.src='default-image.jpg';">
                <div class="details">
                    <div class="title"><?php echo htmlspecialchars($cartoons['judul']); ?></div>
                    <div class="rating">Rating: <?php echo $cartoons['rating']; ?> 
                        <span class="stars">★★★★★</span>
                    </div>
                    <div class="description"><?php echo htmlspecialchars($cartoons['deskripsi']); ?></div>
                    <div class="additional-info">
                        Sutradara: <?php echo htmlspecialchars($cartoons['sutradara']); ?><br>
                        Durasi: <?php echo $cartoons['durasi']; ?><br>
                        Tahun Rilis: <?php echo $cartoons['tahun_rilis']; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<p>cartoons tidak ditemukan.</p>";
    }

    $stmt->close();
} else {
    echo "<p>cartoons tidak dipilih.</p>";
}

$dbb->close();
?>

<?php
  include 'review.php';  
  ?>

  <script>
    var submitButton = document.getElementById('submitComment');
    submitButton.addEventListener('click', function() {
      var commentText = document.getElementById('comment').value;
      if (commentText.trim() === '') {
        return;
      }

      var reviewList = document.getElementById('reviewList');
      var newReview = document.createElement('div');
      newReview.classList.add('review');

      var reviewHeader = document.createElement('div');
      reviewHeader.classList.add('review-header');
      
 

      var userInfo = document.createElement('div');
      var username = document.createElement('div');
      username.classList.add('username');
      username.textContent = 'Pengguna Baru';
      var reviewDate = document.createElement('div');
      reviewDate.classList.add('review-date');
      var currentDate = new Date().toISOString().split('T')[0];
      reviewDate.textContent = 'Tanggal: ' + currentDate;

      userInfo.appendChild(username);
      userInfo.appendChild(reviewDate);

      

      var comment = document.createElement('div');
      comment.classList.add('comment');
      comment.textContent = commentText;

      var actions = document.createElement('div');
      actions.classList.add('actions');
      actions.innerHTML = `
        <span class="action-button"><i class="fas fa-thumbs-up"></i> Like</span>
        <span class="action-button"><i class="fas fa-thumbs-down"></i> Dislike</span>
        <span class="action-button"><i class="fas fa-reply"></i> Reply</span>
        <span class="action-button"><i class="fas fa-exclamation-triangle"></i> Laporkan</span>
      `;

      newReview.appendChild(reviewHeader);
      newReview.appendChild(comment);
      newReview.appendChild(actions);

      reviewList.prepend(newReview);

      document.getElementById('comment').value = '';
    });
  </script>
</body>
</html>