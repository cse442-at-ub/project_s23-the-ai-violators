<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../config/database.php';

final class DBTest extends TestCase
{

    protected function setUp(): void {
        $mysqli = getConnection();
        $result = mysqli_query($mysqli, "DELETE FROM users WHERE user_name='testUser'");
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

        $dailyIntakeCols = array("user_id", "meal_id", "meal_name", "date", "calories", "protein", "carbs", "fat");
        $result = mysqli_query($mysqli, "SHOW columns FROM daily_intake");
        for ($i = 0; $i < count($dailyIntakeCols); $i++) {
            $row = mysqli_fetch_row($result);
            $this->assertEquals($row[0], $dailyIntakeCols[$i]);
        }
    }

    public function testCreateUser(): void
    {
        $didCreateUser = createUser("testUser", "test@email.com", "testPassword");
        $this->assertTrue($didCreateUser);

        $mysqli = getConnection();
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

    public function testCheckLogin(): void {
        $didCreateUser = createUser("testUser", "test@email.com", "testPassword");
        $didLogin = checkLogin("testUser", "testPassword");

        $this->assertTrue($didLogin);
    }

    public function testStoreSurveyInformation(): void {
        $mysqli = getConnection();
        createUser("testUser", "test@email.com", "testPassword");
        storeSurveyInformation("testUser", 72, 175, "MALE", 20, 1.9, "MAINTAIN", "PROTIEN");

        $row = getUserInfo("testUser");


        // targetCal[6], targetProtien[7], targetCarbs[8], targetFat[9]
        $this->assertEquals($row[6], 3681.95);
        $this->assertEquals($row[7], 210);
        $this->assertEquals($row[8], 587.988);
        $this->assertEquals($row[9], 70);
        $this->assertEquals(getCalorieGoals("testUser"), 3681.95);

        $targetMacros = getMacroGoals("testUser");
        $this->assertEquals($targetMacros[0], 210);
        $this->assertEquals($targetMacros[1], 587.988);
        $this->assertEquals($targetMacros[2], 70);

        updateUserInfo("testUser", null, 190, null, null, null, null, null, null, null, null);

        $this->assertEquals(getUserInfo('testUser')[2], 190);


    }

    public function testGetCalorieGoals(): void {
        $mysqli = getConnection();
        createUser("testUser", "test@email.com", "testPassword");
        storeSurveyInformation("testUser", 72, 175, "MALE", 20, 1.9, "MAINTAIN", "PROTIEN");
        $userId = getIDFromUsername("testUser");
        $result = getCalorieGoals("testUser");
        $this->assertEquals($result, 3681.95);
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

    public function testGetHistory(): void {
        $mysqli = getConnection();
        $didCreateUser = createUser("testUser", "test@email.com", "testPassword");
        $this->assertTrue($didCreateUser);
        $date = date("Y-m-d");


        $history = getHistory("testUser");
        $this->assertEquals($history,[]);

    }

    public function testTrackCaloriesAndMacros(): void {
        $mysqli = getConnection();
        createUser("testUser", "test@email.com", "testPassword");
        $date = date("Y-m-d");
        $userId = getIDFromUsername("testUser");

        storeSurveyInformation("testUser", 70, 160, "MALE", 20, 1.9, "MAINTAIN", "PROTIEN");

        $didTrackCaloriesAndMacros = trackCaloriesAndMacros("testUser", "eggs", $date, 2000, 100, 100, 100);
        $this->assertTrue($didTrackCaloriesAndMacros);

        $remaining = getRemainingMacros("testUser");
        $this->assertEquals(intval($remaining[0]), 1455);
        $this->assertEquals(intval($remaining[1]), 459);
        $this->assertEquals($remaining[2], 92);
        $this->assertEquals($remaining[3], -36);

        $didTrackCaloriesAndMacros = trackCaloriesAndMacros("testUser", "steak", $date, 2000, 100, 100, 100);
        $this->assertTrue($didTrackCaloriesAndMacros);

        $cals = getDailyCalories("testUser", $date)[0];
        $this->assertEquals($cals[0], 2000);
        $this->assertEquals($cals[4], "eggs");


    }

    public function testAddRestriction(): void {
        $didCreateUser = createUser("testUser", "test@email.com", "testPassword");
        storeSurveyInformation("testUser", 72, 175, "MALE", 20, 1.9, "MAINTAIN", "PROTIEN");

        $this->assertTrue($didCreateUser);
        $didAddRestriction = addRestrictions("testUser", ['Lactose Intolerance','Gluten Intolerance']);
        $this->assertTrue($didAddRestriction);

        $restrictions = getRestrictions("testUser");
        $this->assertEquals($restrictions[0], "Lactose Intolerance");
        $this->assertEquals($restrictions[1], "Gluten Intolerance");

        $didAddRestriction = addRestrictions("testUser", ['Lactose Intolerance','Gluten Intolerance']);
        $this->assertTrue($didAddRestriction);

        removeRestriction("testUser", ["Lactose Intolerance"]);
        $restrictions = getRestrictions("testUser");
        $this->assertEquals($restrictions[0], "Gluten Intolerance");

        removeRestriction("testUser", ["Gluten Intolerance"]);
        $restrictions = getRestrictions("testUser");
        $this->assertEquals($restrictions, []);

        $this->assertEquals(getRestrictionId("Lactose Intolerance"), 1);
        $this->assertEquals(getRestrictionId("Gluten Intolerance"), 2);

        $this->assertEquals(getRestrictionName(1), "Lactose Intolerance");
        $this->assertEquals(getRestrictionName(2), "Gluten Intolerance");

        $this->assertEquals(getRestrictionName(8), "Fish/Shellfish Allergy");
        $this->assertEquals(getRestrictionName(9), "Wheat Allergy");

        $excersises = reccomendExercise("testUser", 5);

    }   

}
