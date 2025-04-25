<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mood History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f0f4f8;
      font-family: 'Segoe UI', sans-serif;
      padding: 40px;
    }

    h2 {
      margin-bottom: 30px;
    }

    .mood-item {
      font-size: 1.2rem;
      padding: 15px 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .happy {
      background-color: #d4edda;
      color: #155724;
    }

    .neutral {
      background-color: #fff3cd;
      color: #856404;
    }

    .sad {
      background-color: #f8d7da;
      color: #721c24;
    }

    .back-link {
      margin-top: 30px;
      display: inline-block;
      font-size: 1rem;
      text-decoration: none;
      color: #007bff;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h2>🕒 Last 5 Mood Entries</h2>

  <?php
  $result = $conn->query("SELECT mood, timestamp FROM moods ORDER BY timestamp DESC LIMIT 5");

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $mood = $row['mood'];
      $timestamp = $row['timestamp'];
      $emoji = '';
      $class = '';

      // Stabilim emoji-ul și clasa de culoare
      if ($mood === 'happy') {
        $emoji = '😁';
        $class = 'happy';
      } elseif ($mood === 'neutral') {
        $emoji = '😐';
        $class = 'neutral';
      } elseif ($mood === 'sad') {
        $emoji = '😢';
        $class = 'sad';
      }

      echo "<div class='mood-item $class'>";
      echo "<span style='font-size: 2rem;'>$emoji</span>";
      echo "<div><strong>" . ucfirst($mood) . "</strong><br><small>$timestamp</small></div>";
      echo "</div>";
    }
  } else {
    echo "<p>No mood entries yet.</p>";
  }

  $conn->close();
  ?>

  <a href="index.html" class="back-link">← Back to main page</a>

</body>
</html>
