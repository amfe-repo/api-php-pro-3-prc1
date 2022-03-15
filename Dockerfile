FROM akme47/codeig-php:latest

WORKDIR /app/myapp

COPY . .

CMD ["bash", "/opt/bitnami/scripts/codeigniter/run.sh"]
