FROM akme47/codeig-php:latest

WORKDIR /app/myapp

COPY . .

EXPOSE 8080

CMD ["bash", "/opt/bitnami/scripts/codeigniter/run.sh"]
