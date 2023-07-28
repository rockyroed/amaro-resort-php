<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
    <title>Amaro Resort</title>
    <script
      src="https://kit.fontawesome.com/dbed6b6114.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- start of admin -->
    <section id="admin">
      <div class="admin-container">
        <div class="side-nav">
          <div class="site-logo">
            <img
              src="css/page-images/AmaroResort.png"
              alt="logo"
              class="logo"
            />
          </div>

          <div class="account">
            <i class="fas fa-user-circle"></i>
            <span>admin@gmail.com</span>
          </div>

          <div class="menu-list">
            <a href="#" id="dashboard">
              <button type="button" class="secondary-btn">
                <i class="fas fa-th-large"></i> DASHBOARD
              </button>

              <button type="button" class="secondary-btn">
                <i class="fas fa-concierge-bell"></i> BOOKING
              </button>
            </a>
          </div>

          <div class="logout">
            <a href="#" id="logout-button">
              <button type="button" class="logout-btn">
                LOGOUT <i class="fas fa-sign-out-alt"></i>
              </button>
            </a>
          </div>
        </div>

        <div class="main-content">
          <div class="content">
            <h1>DASHBOARD</h1>
            <div class="dashboard">
              <div class="dashboard-row">
                <div class="dashboard-container">
                  <span>Daily Sales</span>
                  <div class="graph">
                    <canvas
                      id="myChart"
                      style="width: 100%; max-width: 600px"
                    ></canvas>
                  </div>
                </div>
                <div class="dashboard-container">
                  <span>Weekly Sales</span>
                </div>
                <div class="dashboard-container">
                  <span>Monthly Sales</span>
                </div>
              </div>

              <div class="dashboard-container">
                <span>Weekly Sales</span>
              </div>
            </div>
          </div>
          <!-- <div class="content">
            <h1>BOOKINGS</h1>
            <div class="booking-table">
              <table id="bookingList">
                <tr>
                  <th>Company</th>
                  <th>Contact</th>
                  <th>Country</th>
                  <th>Country</th>
                  <th>Country</th>
                  <th>Country</th>
                </tr>
                <tr>
                  <td>Alfreds Futterkiste</td>
                  <td>Maria Anders</td>
                  <td>Germany</td>
                  <td>Germany</td>
                  <td>Germany</td>
                  <td>Germany</td>
                </tr>
                <tr>
                  <td>Berglunds snabbköp</td>
                  <td>Christina Berglund</td>
                  <td>Sweden</td>
                  <td>Germany</td>
                  <td>Germany</td>
                  <td>Germany</td>
                </tr>
                <tr>
                  <td>Centro comercial Moctezuma</td>
                  <td>Francisco Chang</td>
                  <td>Mexico</td>
                  <td>Germany</td>
                  <td>Germany</td>
                  <td>Germany</td>
                </tr>
                <tr>
                  <td>Ernst Handel</td>
                  <td>Roland Mendel</td>
                  <td>Austria</td>
                  <td>Germany</td>
                  <td>Germany</td>
                  <td>Germany</td>
                </tr>
                <tr>
                  <td>Island Trading</td>
                  <td>Helen Bennett</td>
                  <td>UK</td>
                  <td>UK</td>
                  <td>UK</td>
                  <td>UK</td>
                </tr>
                <tr>
                  <td>Königlich Essen</td>
                  <td>Philip Cramer</td>
                  <td>Germany</td>
                  <td>UK</td>
                  <td>UK</td>
                  <td>UK</td>
                </tr>
                <tr>
                  <td>Laughing Bacchus Winecellars</td>
                  <td>Yoshi Tannamuri</td>
                  <td>Canada</td>
                  <td>UK</td>
                  <td>UK</td>
                  <td>UK</td>
                </tr>
                <tr>
                  <td>Magazzini Alimentari Riuniti</td>
                  <td>Giovanni Rovelli</td>
                  <td>Italy</td>
                  <td>UK</td>
                  <td>UK</td>
                  <td>UK</td>
                </tr>
                <tr>
                  <td>North/South</td>
                  <td>Simon Crowther</td>
                  <td>UK</td>
                  <td>UK</td>
                  <td>UK</td>
                  <td>UK</td>
                </tr>
                <tr>
                  <td>Paris spécialités</td>
                  <td>Marie Bertrand</td>
                  <td>France</td>
                  <td>France</td>
                  <td>France</td>
                  <td>France</td>
                </tr>
              </table>
            </div>
          </div> -->
        </div>
      </div>
    </section>
    <!-- end of admin   -->
    <script type="module" src="javascript/admin.js"></script>
  </body>
</html>
