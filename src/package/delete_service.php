<?php
require __DIR__ . '/../bootstrap.php';

function deleteServiceById($serviceId)
{
    $db = getDBConnection();

    $serviceId = intval($serviceId);

    $query = "DELETE FROM package WHERE id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        return false; // Or handle the error as required
    }

    $stmt->bind_param("i", $serviceId);
    $result = $stmt->execute();

    $stmt->close();
    $db->close();

    return $result;
}


if (is_post_request() && is_admin()) {
    // Check if the 'delete_service' parameter is set in the POST request
    if (isset($_POST['delete_service'])) {
        $serviceId = $_POST['service_id'];

        // Call a function to delete the service by ID
        $result = deleteServiceById($serviceId);

        if ($result === true) {
            // Redirect with success message
            redirect_with_message(
                '../../public/services.php',
                'The service has been deleted successfully.'
            );
        } else {
            // Redirect with error message
            redirect_with_message(
                '../../public/services.php',
                'Error deleting the service. Please try again.',
                FLASH_ERROR
            );
        }
    } else {
        // Redirect with error message if 'delete_service' parameter is not set
        redirect_with_message(
            '../../public/services.php',
            'Invalid request. Please try again.',
            FLASH_ERROR
        );
    }
} else {
    // Redirect with error message if not an admin or not a POST request
    redirect_with_message(
        '../../public/services.php',
        'You do not have permission to perform this action.',
        FLASH_ERROR
    );
}
