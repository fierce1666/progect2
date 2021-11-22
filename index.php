<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Database</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include "database.php";

            $result = mysqli_query($induction, "SELECT * FROM `employee`");
            echo("<table style='width:50%' id='table'>
                        <tr style='cursor: pointer;'>
                            <th width='7%'>Номер▼</th>
                            <th width='18%'>Должность</th>
                            <th width='18%'>Фамилия</th>
                            <th width='18%'>Имя</th>
                            <th width='18%'>Отчество</th>
                            <th width='14%'>Дата рождения</th>
                            <th width='7%'>Общий Стаж</th>
                            <th width='8%'>Педагогический стаж</th>
                            <th width='10%'>Педагогическое образование</th>
                            <th width='10%'>Наличие педагогического образования</th>
                        </tr>
                  ");
            while($empl = $result->fetch_assoc()){
                echo("<tr>");
                foreach($empl as $param){
                    echo "<td>".$param."</td>";
                };
                echo("</tr>");
            };
            echo("</table>");
        ?>
        <script>
            const table = document.getElementById("table");
            const comp = (x, asc) => (tra, trb) => {
                let a = tra.children[x].innerText;
                let b = trb.children[x].innerText;
                if(isNaN(a) || isNaN(b)){
                    return a > b ? asc ? false : true : asc ? true : false;
                }
                return asc ? parseInt(b) > parseInt(a) : parseInt(a) > parseInt(b);
            }
            var asc = true;
            document.querySelectorAll("th").forEach(th => th.addEventListener("click", (() => {
                document.querySelectorAll("th").forEach(thr => thr.innerHTML = thr.innerHTML.replace("▲", "").replace("▼", ""));
                Array.from(table.querySelectorAll("tr:nth-child(n+2)")).sort(comp(Array.from(th.parentNode.children).indexOf(th), asc = !asc)).forEach(tr => table.appendChild(tr));
                th.innerHTML += this.asc ? "▲" : "▼";
            })));
        </script>
    <h1>Добавление</h1>

<form action ="/create.php" method="post">
    <p>Должность</p>
    <input type ="text" name="departament">
    <p>Фамилия</p>
    <input type ="text" name="lastname">
    <p>Имя</p>
    <input type ="text" name="firstname">
    <p>Отчество</p>
    <input type ="text" name="patron">
    <p>Дата рождения</p>
    <input type ="text" name="birth">
    <p>Общий Стаж</p>
    <input type ="number" name="all_work"> 
    <p>Педагогический стаж</p>
    <input type ="text" name="education">
    <p>Педагогическое образование</p>
    <input type ="text" name="ped_edu"> 
    <p>Наличие педагогического образования</p>
    <input type ="text" name="ped_edu"> 
    
    <br></br><br></br>
 
    <button type = "submit" > Добавить нового человека </button>
</form>
    </body>
</html>
