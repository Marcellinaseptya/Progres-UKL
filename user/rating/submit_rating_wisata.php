<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

include '../../koneksi.php';

if (isset($_POST['IDtransaksi']) && isset($_POST['rating']) && isset($_POST['feedback'])) {
    $IDtransaksi = $_POST['IDtransaksi'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];
    $username = $_SESSION['username'];

    // Ambil ID pengguna berdasarkan username
    $stmt = $mysqli->prepare("SELECT ID FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    
    // Eksekusi pernyataan
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userID = $row['ID'];

            // Ambil IDwisata berdasarkan IDtransaksi_wisata
            $stmt = $mysqli->prepare("SELECT IDwisata FROM transaksi WHERE IDtransaksi = ?");
            $stmt->bind_param("s", $IDtransaksi);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $IDwisata = $row['IDwisata'];

                    // Masukkan rating dan feedback
                    $insertStmt = $mysqli->prepare("INSERT INTO rating_wisata (IDtransaksi, IDwisata, rating, feedback, ID) VALUES (?, ?, ?, ?, ?)");
                    $insertStmt->bind_param("sisss", $IDtransaksi, $IDwisata, $rating, $feedback, $userID);

                    if ($insertStmt->execute()) {
                        header("Location: ../riwayat.php");
                        exit();
                    } else {
                        echo "Gagal memasukkan rating dan feedback.";
                    }
                } else {
                    echo "Transaksi yang sesuai tidak ditemukan.";
                }
            } else {
                echo "Gagal menjalankan kueri.";
            }
        } else {
            echo "Pengguna tidak ditemukan.";
        }
    } else {
        echo "Gagal menjalankan kueri.";
    }

    $stmt->close();
} else {
    echo "Data tidak lengkap.";
}

$mysqli->close();
?>
