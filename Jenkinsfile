pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Pull code from your Git server
                git url: 'http://git-server:3000/repository.git'
            }
        }

        stage('Build') {
            steps {
                // For PHP, "build" is just checking files exist
                sh 'ls -l'
            }
        }

        stage('Dependency Check') {
            steps {
                // Example: run npm install if package.json exists
                sh '''
                if [ -f package.json ]; then
                  npm install
                else
                  echo "No dependencies to install"
                fi
                '''
            }
        }

        stage('Simple HTTP Test') {
            steps {
                // Curl the app to check it responds
                sh 'curl -s http://nginxwebsvr/index.php || true'
            }
        }

        stage('SonarQube Analysis') {
            steps {
                script {
                    withSonarQubeEnv('sonarqube') {
                        // Use the scanner tool you registered in Global Tool Configuration
                        def scannerHome = tool 'SonarScanner'
                        sh """
                        ${scannerHome}/bin/sonar-scanner \
                            -Dsonar.projectKey=version2 \
                            -Dsonar.sources=. \
                            -Dsonar.host.url=http://sonarqube:9000
                        """
                    }
                }
            }
        }
    }
}