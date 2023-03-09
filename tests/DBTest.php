<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../config/database.php';

final class DBTest extends TestCase
{
    public function testUserTableStructuredCorrectly(): void
    {
        $mysqli = getConnection();

        $usersCols = array("user_id", "user_name", "email", "password_hash");
        $result = mysqli_query($mysqli, "SHOW columns FROM users");
        for ($i = 0; $i < count($usersCols); $i++) {
            $row = mysqli_fetch_row($result);
            $this->assertEquals($row[0], $usersCols[$i]);
        }
    }

    public function testUserInfoTableStructuredCorrectly(): void
    {
        $mysqli = getConnection();
        
        $userInfoCols = array("user_id", "sex", "height", "weight", "goal", "focus");
        $result = mysqli_query($mysqli, "SHOW columns FROM user_info");
        for ($i = 0; $i < count($userInfoCols); $i++) {
            $row = mysqli_fetch_row($result);
            $this->assertEquals($row[0], $userInfoCols[$i]);
        }
    }

    public function testDailyIntakeTableStructuredCorrectly(): void
    {
        $mysqli = getConnection();

        $dailyIntakeCols = array("user_id", "date", "calories", "protein", "carbs", "fat");
        $result = mysqli_query($mysqli, "SHOW columns FROM daily_intake");
        for ($i = 0; $i < count($dailyIntakeCols); $i++) {
            $row = mysqli_fetch_row($result);
            $this->assertEquals($row[0], $dailyIntakeCols[$i]);
        }
    }
}
