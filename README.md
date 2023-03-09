# project_s23-the-ai-violators

# HOW TO USE DEV CONTAINER
1) clone or pull the most recent version of the repo
2) open the repo in vscode on your host machine
3) make sure you have the `Dev Containers` extention
4) in the lower left corner, click the blue button, then click `reopen in container`
5) wait a few minutes for the container to build and install
6) start developing!

# HOW TO START SERVER
1) Follow setps to open in dev conainer
2) Run `./start.sh`
3) Navigate to `http://localhost:8080` to view website

# HOW TO DEPLOY TO PROD
1) ssh into cheshire with `ssh <YOUR-UBIT>@cheshire.cse.buffalo.edu` and input your ubit password
    * Note: You must be connected to the UB network to access cheshire. You must either be physicly on camput or be running UB's VPN
2) go to our project directory with `cd /web/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators`
3) call `git pull origin dev`
   * Note: If this failes, make sure you have your ssh keys installed on cheshire
