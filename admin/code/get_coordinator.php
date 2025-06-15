<?php
include '../../config/db.php';

header('Content-Type: application/json');

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';

if (empty($id)) {
    echo json_encode(['error' => 'No ID provided']);
    exit;
}

$query = "SELECT * FROM aca_coordinator WHERE ac_id = '$id'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $acc = mysqli_fetch_assoc($result);

    // Get all school for department dropdown
    $schoolsQuery = "SELECT * FROM school";
    $schoolsResult = mysqli_query($con, $schoolsQuery);
    $schools = [];

    if ($schoolsResult) {
        while ($school = mysqli_fetch_assoc($schoolsResult)) {
            $schools[] = [
                'sch_id' => $school['sch_id'],
                'sch_name' => $school['sch_name']
            ];
        }
        mysqli_free_result($schoolsResult);
    }

    echo json_encode([
        'ac_id' => $acc['ac_id'],
        'ac_name' => $acc['ac_name'],
        'ac_email' => $acc['ac_email'],
        'ac_phoneno' => $acc['ac_phoneno'],
        'ac_password' => $acc['ac_password'],
        'ac_department' => $acc['ac_department'],
        'schools' => $schools
    ]);
} else {
    echo json_encode(['error' => 'No Coordinator found with the provided ID']);
}

mysqli_free_result($result);
mysqli_close($con);
?>
