pipeline {
    agent any

    stages {
        stage('Install Dependencies') {
            steps {
                // Instalasi Composer yang sudah terbukti berhasil
                sh 'C:/Users/Lab32/php/php.exe -r "copy(\'https://getcomposer.org/installer\', \'composer-setup.php\');"'
                sh 'C:/Users/Lab32/php/php.exe composer-setup.php --install-dir . --filename composer.phar'
                sh 'C:/Users/Lab32/php/php.exe composer.phar install --prefer-dist --no-interaction'
                sh 'rm composer-setup.php'
            }
        }
        
        stage('Run Test (Method A: ABSOLUTE PATH)') {
            steps {
                // Metode A: Menggunakan variabel WORKSPACE untuk path absolut ke binary PHPUnit
                sh 'C:/Users/Lab32/php/php.exe "${WORKSPACE}/vendor/phpunit/phpunit/phpunit" --bootstrap vendor/autoload.php --log-junit target/result.xml tests'
            }
        }
        
        stage('Run Test (Method B: VENDOR/BIN)') {
            steps {
                // Metode B: Menggunakan vendor/bin/phpunit yang seharusnya berfungsi (jika di-link dengan benar)
                sh 'C:/Users/Lab32/php/php.exe vendor/bin/phpunit --bootstrap vendor/autoload.php --log-junit target/result.xml tests'
            }
        }
    }
    
    post {
        always {
            // Memublikasikan hasil JUnit
            junit 'target/result.xml'
        }
    }
}
