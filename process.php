<!DOCTYPE html>
<html>
<head>
    <title>매표소 사이트</title>
</head>
<body>
    <h1>매표소 사이트</h1>

    
    <form method="post" action="process.php">
    <label for="name">고객성명</label>
    <input type="text" id="customer_name" name="customer_name">
        <table border="1">
            <tr>
                <th>No</th>
                <th>구분</th>
                <th>어린이</th>
                <th>어른</th>
                <th>비고</th>
            </tr>
            <tr>
                <td>1</td>
                <td>입장권</td>
                <td>7,000
                    <input type="number" name="child_tickets" value="0">
                </td>
                <td>10,000
                    <input type="number" name="adult_tickets" value="0">
                </td>
                <td>입장</td>
            </tr>
            <tr>
                <td>2</td>
                <td>BIG3</td>
                <td>12,000
                    <input type="number" name="big3_child_tickets" value="0">
                </td>
                <td>16,000
                    <input type="number" name="big3_adult_tickets" value="0">
                </td>
                <td>입장+놀이3종</td>
                
            </tr>
            <tr>
                <td>3</td>
                <td>자유이용권</td>
                <td>21,000
                    <input type="number" name="free_child_tickets" value="0">
                </td>
                <td>26,000
                    <input type="number" name="free_adult_tickets" value="0">
                </td>
                <td>입장+놀이자유</td>
            </tr>
            <tr>
                <td>4</td>
                <td>연간이용권</td>
                <td>70,000
                    <input type="number" name="annual_child_tickets" value="0">
                </td>
                <td>90,000
                    <input type="number" name="annual_adult_tickets" value="0">
                </td>
                <td>입장+놀이자유</td>
                <td>
                    
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="합계">
    </form>

    <?php
    // MySQL 데이터베이스 연결 설정
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "amuse";

    // MySQL 데이터베이스 연결
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("데이터베이스 연결 실패: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // POST로 전달된 표 수량 가져오기
        $child_tickets = $_POST["child_tickets"];
        $adult_tickets = $_POST["adult_tickets"];
        $big3_child_tickets = $_POST["big3_child_tickets"];
        $big3_adult_tickets = $_POST["big3_adult_tickets"];
        $free_child_tickets = $_POST["free_child_tickets"];
        $free_adult_tickets = $_POST["free_adult_tickets"];
        $annual_child_tickets = $_POST["annual_child_tickets"];
        $annual_adult_tickets = $_POST["annual_adult_tickets"];

        // 현재 날짜와 시각 가져오기
        $current_date_time = date("Y-m-d H:i:s");

        // 고객 이름
        $customer_name = $_POST["customer_name"];

        // 총합 계산
        $total_amount = $child_tickets * 7000 + $adult_tickets*10000+ $big3_child_tickets * 12000 + $big3_adult_tickets*16000 + $free_child_tickets * 21000 + $free_adult_tickets*26000+$annual_child_tickets*70000+ $annual_adult_tickets * 90000;
        $child = $child_tickets + $big3_child_tickets + $free_child_tickets + $annual_child_tickets;
        $adult = $adult_tickets + $big3_adult_tickets + $free_adult_tickets + $annual_adult_tickets;

        // 데이터베이스에 데이터 삽입
        $sql = "INSERT INTO ticket_sales (datetime, customer_name, child_tickets, adult_tickets, big3_child_tickets, big3_adult_tickets, free_child_tickets, free_adult_tickets, annual_child_tickets, annual_adult_tickets, total_amount)
        VALUES ('$current_date_time', '$customer_name', $child_tickets, $adult_tickets, $big3_child_tickets, $big3_adult_tickets, $free_child_tickets, $free_adult_tickets, $annual_child_tickets, $annual_adult_tickets, $total_amount)";


        if ($conn->query($sql) === TRUE) {
            echo "<p>$current_date_time</p>";
            echo "<p>고객 이름: $customer_name</p>";
            echo "<p>어린이 입장권 $child 개, 어른 $adult 개, 총합 $total_amount 원 입니다.</p>";
        } else {
            echo "데이터 삽입 실패: " . $conn->error;
        }
    }

    // MySQL 연결 종료
    $conn->close();
    ?>
</body>
</html>