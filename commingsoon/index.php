<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SmartPath - Live Course</title>
    <style>
      /* Reset some default styles */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f9f9f9;
      }

      /* Header Styling */
      header {
        width: 100%;
        padding: 1rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        z-index: 1000;
      }

      header .logo {
        display: flex;
        align-items: center;
      }

      header .logo img {
        width: 40px;
        height: auto;
        margin-right: 10px;
      }

      header .logo span {
        font-size: 14px;
        color: #666;
      }

      header nav {
        display: flex;
        align-items: center;
      }

      header nav a {
        color: #333;
        margin: 0 1rem;
        text-decoration: none;
        font-size: 16px;
      }

      header nav a.active {
        color: #666;
        font-weight: bold;
        background-color: #f0f0f0;
        padding: 0.5rem 1rem;
        border-radius: 5px;
      }

      header .login-btn {
        background-color: #ffcd3c;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-left: 1rem;
      }

      header .login-btn:hover {
        background-color: #ffb833;
      }

      /* Main Content Styling */
      main {
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 80px); /* Adjust for header height */
        margin-top: 80px;
        text-align: center;
      }

      .content {
        max-width: 600px;
      }

      .content img {
        width: 100%;
        max-width: 300px;
        height: auto;
        margin-bottom: 1rem;
      }

      .content p {
        color: #333;
        font-size: 18px;
        line-height: 1.5;
      }
    </style>
  </head>
  <body>
 

    <!-- Main Content -->
    <main>
      <div class="content">
        <img
          src="pam.jpg"
          alt="Under Development"
        />
        <!-- Replace with actual illustration path -->
        <p>
          Maaf fitur ini masih dalam tahap pengembangan. Nantikan informasi
          lebih lanjut tentang fitur ini di Instagram @computeraccountant_
        </p>
      </div>
    </main>
  </body>
</html>
