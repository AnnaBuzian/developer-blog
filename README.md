# developer-blog
# Developer Blog - project Symfony 4 + GraphQL (PHP 7.1-FPM - NGINX - Redis - ELK)
Bundle youshido/graphql-bundle is used in this project.

## Usage
1. Install docker and docker-compose 1.18 [here](https://docs.docker.com/compose/).

2. Configurable docker HTTP/HTTPS proxy [here](https://docs.docker.com/engine/admin/systemd/#httphttps-proxy).

3. Create a `.env` from the `.env.dist` file. Adapt it according to your application

   ```bash
   cp .env.dist .env
   ```
4. Build/run/stop containers with
     
    ```bash
    $ ./docker_build # build image
    $ ./docker_start # start containers
    $ ./docker_stop  # stop containers
    ```

6. Enjoy :)