<?php
require __DIR__ . '/../bootstrap.php';

function deleteServiceById($serviceId)
{
    $db = getDBConnection();

    $serviceId = intval($serviceId);

    $query = "DELETE FROM package WHERE id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        return false;
    }

    $stmt->bind_param("i", $serviceId);
    $result = $stmt->execute();

    $stmt->close();
    $db->close();

    return $result;
}


if (is_post_request() && is_admin()) {
    check_csrf_token();
    if (isset($_POST['delete_service'])) {
        $serviceId = $_POST['service_id'];

        $result = deleteServiceById($serviceId);

        if ($result === true) {
            redirect_with_message(
                '../../public/services.php',
                'The service has been deleted successfully.'
            );
        } else {
            redirect_with_message(
                '../../public/services.php',
                'Error deleting the service. Please try again.',
                FLASH_ERROR
            );
        }
    } else {
        redirect_with_message(
            '../../public/services.php',
            'Invalid request. Please try again.',
            FLASH_ERROR
        );
    }
} else {
    redirect_with_message(
        '../../public/services.php',
        'You do not have permission to perform this action.',
        FLASH_ERROR
    );
}
