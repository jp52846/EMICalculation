<h1 align="center"> EMI-Calculation Project</h1>
<h3 align="center">Register Page</h3>
<p align="center"> <img src="https://github.com/jp52846/EMICalculation/blob/main/screenshorts/registerPage.png"> </p>

<h3 align="center">Login Page</h3>
<p align="center"> <img src="https://github.com/jp52846/EMICalculation/blob/main/screenshorts/loginPage.png"> </p>

<h3 align="center">EMI Calculation</h3>
<p align="center"> <img src="https://github.com/jp52846/EMICalculation/blob/main/screenshorts/EmiCalc.png"> </p>

<h3 align="center">EMI History</h3>
<p align="center"> <img src="https://github.com/jp52846/EMICalculation/blob/main/screenshorts/EmiHistory.png"> </p>

<h3 align="center">EMI History Search</h3>
<p align="center"> <img src="https://github.com/jp52846/EMICalculation/blob/main/screenshorts/EmiHistorySearch.png"> </p>


### XAMPP server version is required
<h5>mysql --version</h5>
mysql  Ver 15.1 Distrib 10.4.20-MariaDB, for Win64 (AMD64)

### download project direct link
<a href="https://github.com/jp52846/EMICalculation/archive/refs/tags/PRE_REL.zip">Download Project</a>

<hr>
<ul>
    <li>git clone https://github.com/jp52846/EMICalculation.git</li>
    <li>cd EmiCalculations-Project</li>
    <li>cp .env.example <pre>.env</pre></li>
    <li>
        create databse name in phpmyadmin and import <a href="https://github.com/jp52846/EmiCalculations-Project/blob/main/projectsql/emi_db.sql">Database</a> 
        from projectsql folder
    </li>
    <li>open .env and update DB_DATABASE(database name)</li>
    <li>run: <pre>composer install</pre></li>
    <li>run: <pre>php artisan key:generate</pre></li>
</ul>
