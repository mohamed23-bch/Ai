@extends('layouts.body')
@section('dash')
<li>
  <a href="{{Route('admin.index')}}">
    <i class="bx bx-grid-alt"></i>
    <span class="links_name">Dashboard</span>
  </a>
</li>
@endsection
@section('Afficher')
 <li>
  <a href="{{Route('admin.Afficher')}}">
    <i class="bx bx-box"></i>
    <span class="links_name">Actions</span>
  </a>
</li> 
@endsection
@section('UserName')
    Admin
@endsection
@section('content')

<head>
  <link rel="stylesheet" href="/css/style.css" />
        {{-- @vite(['resources/js/app.js']) --}}
        <!-- Boxicons CDN Link -->
        <link
          href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
          rel="stylesheet"
        />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      </head>
{{-- <section class="home-section"> --}}
  <div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Annexe</div>
        <div class="number">40,876</div>
        <div class="indicator">
          <i class="bx bx-up-arrow-alt"></i>
          <span class="text">Depuis hier</span>
        </div>
      </div>
      <i class="bx bx-cart-alt cart"></i>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Provaice</div>
        <div class="number">38,876</div>
        <div class="indicator">
          <i class="bx bx-up-arrow-alt"></i>
          <span class="text">Depuis hier</span>
        </div>
      </div>
      <i class="bx bxs-cart-add cart two"></i>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">User</div>
        <div class="number">12,876 F</div>
        <div class="indicator">
          <i class="bx bx-up-arrow-alt"></i>
          <span class="text">Depuis hier</span>
        </div>
      </div>
      <i class="bx bx-cart cart three"></i>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Revenu</div>
        <div class="number">11,086</div>
        <div class="indicator">
          <i class="bx bx-down-arrow-alt down"></i>
          <span class="text">Aujourd'hui</span>
        </div>
      </div>
      <i class="bx bxs-cart-download cart four"></i>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <div class="sales-boxes">
    <div class="recent-sales box" >
      <div>
        <canvas id="myChart"></canvas>
      </div>
      <script>
        const data = {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [{
            label: 'Looping tension',
            data: [65, 59, 80, 81, 26, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
          }]
        };


        const config = {
          type: 'line',
          data: data,
          options: {
            animations: {
              tension: {
                duration: 1000,
                easing: 'linear',
                from: 1,
                to: 0,
                loop: true
              }
            },
            scales: {
              y: { // defining min and max so hiding the dataset does not change scale range
                min: 0,
                max: 100
              }
            }
          }
        };


  // === include 'setup' then 'config' above ===

          var myChart = new Chart(
            document.getElementById('myChart'),
            config
          );
      </script>
    </div>
    {{-- style="width: 800px" --}}
    <div style="width: 1000px">
      <canvas id="myChart"></canvas>
    </div>
  </div>
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  --}}
    {{-- <div class="top-sales box"> --}}
    



      <script>


          const data = {
            labels: [
              'Red',
              'Blue',
              'Yellow'
            ],
            datasets: [{
              label: 'My First Dataset',
              data: [300, 50, 100],
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
              ],
              hoverOffset: 4
            }]
          };
            const config = {
                type: 'doughnut',
                data: data,
              };



      var myChart = new Chart(
            document.getElementById('myChart'),
            config
          );

      </script>
      
</div> 


</body>
</html>


@endsection