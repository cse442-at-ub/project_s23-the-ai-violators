<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../config/database.php';

final class DBTest extends TestCase
{

    protected function setUp(): void {
        $result = mysqli_query(getConnection(), "DELETE FROM users WHERE user_name='testUser'");
    }

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
        
        $userInfoCols = array("user_id", "height", "weight", "age", "sex", "activityLevel", "targetCAL", "targetPROTIEN", "targetCARBS", "targetFAT", "goal", "focus");
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

    public function testCreateUser(): void
    {
        $mysqli = getConnection();
        $didCreateUser = createUser("testUser", "test@email.com", "testPassword");
        $this->assertTrue($didCreateUser);

        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE user_name='testUser'");
        $row = mysqli_fetch_row($result);
        $this->assertEquals($row[1], "testUser");


        // expect error because user already exists
        $didCreateUser = createUser("testUser", "test123@email.com", "testPassword");
        $this->assertFalse($didCreateUser);

        // expect error because email already exists
        $didCreateUser = createUser("testUser123", "test@email.com", "testPassword");
        $this->assertFalse($didCreateUser);

    }

    public function testStoreSurveyInformation(): void {
        $mysqli = getConnection();
        createUser("testUser", "test@email.com", "testPassword");
        storeSurveyInformation("testUser", 72, 175, "MALE", 20, 1.9, "MAINTAIN", "PROTIEN");
        $userId = getIDFromUsername("testUser");
        $result = mysqli_query($mysqli, "SELECT * FROM user_info WHERE user_id=$userId");
        $row = mysqli_fetch_row($result);
        // targetCal[6], targetProtien[7], targetCarbs[8], targetFat[9]
        $this->assertEquals($row[6], 3719.84);
        $this->assertEquals($row[7], 210);
        $this->assertEquals($row[8], 597.461);
        $this->assertEquals($row[9], 70);


    }

    public function testGetCalorieGoals(): void {
        $mysqli = getConnection();
        createUser("testUser", "test@email.com", "testPassword");
        storeSurveyInformation("testUser", 72, 175, "MALE", 20, 1.9, "MAINTAIN", "PROTIEN");
        $userId = getIDFromUsername("testUser");
        $result = getCalorieGoals($userId);
        $this->assertEquals($result, 3719.84)
    }

    public function testCheckInitalLogin(): void {
        $mysqli = getConnection();
        $didCreateUser = createUser("testUser", "test@email.com", "testPassword");
        $this->assertTrue($didCreateUser);

        $didInitalLogin = checkInitalLogin("testUser");
        $this->assertFalse($didInitalLogin);

        storeSurveyInformation("testUser", 72, 175, "MALE", 20, 1.9, "MAINTAIN", "PROTIEN");

        $didInitalLogin = checkInitalLogin("testUser");
        $this->assertTrue($didInitalLogin);

    }

}
