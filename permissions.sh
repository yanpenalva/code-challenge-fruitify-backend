#!/usr/bin/env bash

change_group_and_permissions() {
    local dir=$1
    local group=$2

    if [ ! -d "$dir" ]; then
        echo "Diretório $dir não encontrado. Pulando."
        return
    fi

    echo "Alterando o grupo para $group e definindo permissões de escrita para o grupo em $dir"
    chgrp -R $group "$dir"
    if [ $? -ne 0 ]; then
        echo "Erro ao alterar grupo em $dir."
        exit 1
    fi
    echo "Grupo alterado com sucesso em $dir."

    echo "Definindo permissões de escrita para o grupo em $dir"
    chmod -R g+w "$dir"
    if [ $? -ne 0 ]; then
        echo "Erro ao definir permissões em $dir."
        exit 1
    fi
    echo "Permissões definidas com sucesso em $dir."

    echo "Definindo o bit setgid em todos os diretórios dentro de $dir"
    find "$dir" -type d -exec chmod g+s {} +
    if [ $? -ne 0 ]; then
        echo "Erro ao definir bit setgid em $dir."
        exit 1
    fi
    echo "Bit setgid definido com sucesso em $dir."
}

change_group_and_permissions "bootstrap/" "www-data"
change_group_and_permissions "storage/" "www-data"

if [ -d "storage/" ]; then
    echo "Aplicando permissões 775 recursivamente na pasta storage"
    chmod -R 775 storage/
    if [ $? -ne 0 ]; then
        echo "Erro ao aplicar permissões 775 na pasta storage."
        exit 1
    fi

    echo "Aplicando permissões 775 na pasta storage e bootstrap/cache"
    chmod -R 775 storage bootstrap/cache
    if [ $? -ne 0 ]; then
        echo "Erro ao aplicar permissões 775 na pasta storage e bootstrap/cache."
        exit 1
    fi

    echo "Permissões 775 aplicadas com sucesso na pasta storage."
else
    echo "Diretório storage/ não encontrado. Pulando chmod 775."
fi

echo "Alterando o grupo de arquivos e diretórios para www-data"
chgrp -R www-data .
if [ $? -ne 0 ]; then
    echo "Erro ao alterar grupo de arquivos e diretórios."
    exit 1
fi
echo "Grupo de arquivos e diretórios alterado com sucesso."

echo "Definindo permissões 777 na pasta database/"
if [ ! -d "database/" ]; then
    echo "Diretório database/ não encontrado. Criando diretório."
    mkdir database/
    if [ $? -ne 0 ]; then
        echo "Erro ao criar diretório database/."
        exit 1
    fi
fi
chmod -R 777 database/
if [ $? -ne 0 ]; then
    echo "Erro ao definir permissões na pasta database/."
    exit 1
fi
echo "Permissões e propriedades de grupo atualizadas com sucesso."
