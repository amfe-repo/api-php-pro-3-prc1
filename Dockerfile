FROM bit/codeig

WORKDIR /app/myapp

COPY . .

CMD ["bash", "/opt/bitnami/scripts/codeigniter/run.sh"]
