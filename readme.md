# NSCC Laravel Demo App - Snow Day?

## Pre-Reqs
We have a few options for spinning up Laravel. We'll look at two. Docker VS Local

### Option 1 : Docker Remote Containers
This year we will introduce the option of rocking docker containers, but before we get there we're still going to need the following to get our projects started:

1. WSL2 or OSX Terminal - You can use Powershell too, but we can only support so many options.
2. Docker Desktop

### Option 2 : Local Installation
1. CLI of Choice : WSL2 (Windows Reccomended), Powershell (Windows Native) or Terminal/iTerm (MacOS)
2. Package Manager : APT (Ubuntu WSL2), Chocolatey (Windows), HomeBrew (MacOS)
3. PHP CLI - this will be included in the docker container, but you might also want it local
4. Composer - PHP Package manager, we'll use this to get all the stuff we need. https://getcomposer.org/download/
5. Node.JS - we'll need the dreaded npm inatall and node modules

You need to be able to run these in your terminal. I'm using WSL2, but any method should suffice as long as they are available in the $path.

## Up and Running
## Option 1 : Docker Remote Containers using Laravel Sail
This is pretty slick. You just need docker desktop running in WSL2.
1. Ensure you have enabled WSL2 integration for your distro [MS Overview](https://docs.microsoft.com/en-us/windows/wsl/tutorials/wsl-containers)
    - Check distros and version`wsl -l -v`
    - Change Version (if needed) `wsl --set-version <distro> 2`
    - OR Just install a new distro `wsl --install` or `wsl --install -d <Distribution Name>`
2. Let r' rip `curl -s https://laravel.build/snow-day | bash`
    - replace "snow-day" with your app's name
    - (optional) creat an alias `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`
3. Set Sail?
    - `cd snow-day && /vendor/bin/sail up` 
    - or with alias `sail up`

## Option 2 : Local
This may require some troubleshooting. It's not uncommon to have to resolve issues with dependancies.

1. Launch WSL2 Bash, PS or Terminal.
2. Install stuff:
    * `sudo apt install php8...`
    * `choco install php`
    * `brew install php`
