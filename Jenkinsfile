pipeline {
    agent any // Menjalankan di agen Jenkins mana pun

    stages {
        // --- Stage 1: Checkout Code ---
        stage('Checkout') {
            steps {
                // Mengambil kode dari SCM (Source Code Management) seperti Git
                checkout scm
            }
        }

        // --- Stage 2: Install Dependencies ---
        stage('Install Dependencies') {
            steps {
                // Instal paket PHPUnit dan dependensi lainnya
                sh 'composer install --prefer-dist --no-interaction'
            }
        }

        // --- Stage 3: Run PHPUnit Tests & Generate Report ---
        stage('Test') {
            steps {
                // 1. Jalankan PHPUnit
                // Gunakan opsi --log-junit untuk menghasilkan file XML hasil tes
                // File ini akan dibaca oleh JUnit Plugin
                sh 'vendor/bin/phpunit --bootstrap vendor/autoload.php --log-junit target/result.xml tests' 
            }
        }

        // --- Stage 4: Publish Results (Reporting) ---
        stage('Publish Results') {
            steps {
                // Memublikasikan hasil tes menggunakan JUnit Plugin
                // Ini akan menghasilkan grafik dan laporan di dashboard Jenkins
                junit 'target/result.xml'
            }
        }
    }
}