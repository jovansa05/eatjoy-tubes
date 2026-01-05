pipeline {
    agent any

    environment {
        DOCKER_REPO        = 'tata197'
        IMAGE_NAME         = 'eatjoy-tubes'
        DOCKER_CREDENTIALS = 'dockerhub-credentials'
        REGISTRY           = 'docker.io'
    }

    stages {
        stage('Checkout Repository') {
            steps { checkout scm }
        }

        stage('Build Docker Image') {
            steps {
                bat """
                @echo off
                docker build --pull ^
                  -t %DOCKER_REPO%/%IMAGE_NAME%:latest .
                """
            }
        }

        stage('Push Image to Docker Hub') {
            steps {
                withCredentials([usernamePassword(
                    credentialsId: DOCKER_CREDENTIALS,
                    usernameVariable: 'DOCKER_USER',
                    passwordVariable: 'DOCKER_PASS'
                )]) {
                    bat """
                    @echo off
                    echo %DOCKER_PASS% | docker login -u %DOCKER_USER% --password-stdin %REGISTRY%
                    docker push %DOCKER_REPO%/%IMAGE_NAME%:latest
                    docker logout %REGISTRY%
                    """
                }
            }
        }

        stage('Pipeline Summary') {
            steps {
                echo """
=====================================
CI/CD EATJOY-TUBES SELESAI
Docker Image:
- ${DOCKER_REPO}/${IMAGE_NAME}:latest
=====================================
"""
            }
        }
    }

    post {
        success { echo '✅ Pipeline berhasil dijalankan' }
        failure { echo '❌ Pipeline gagal, cek log Jenkins' }
        always  { cleanWs() }
    }
}
