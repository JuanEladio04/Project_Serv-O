#!/bin/bash

# Directorio donde se encuentra el script run.sh
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"

# Directorio donde se encuentra docker-compose.yml
COMPOSE_DIR="$SCRIPT_DIR"

# Cambiar al directorio que contiene docker-compose.yml
cd "$COMPOSE_DIR"

# Construir y levantar los contenedores
docker-compose up --build -d

# Seguir los logs de los contenedores
docker-compose logs -f
