#!/bin/bash

rsync -av --exclude '*.sh' --exclude 'README.md' --exclude 'LICENSE' /home/em/repos/EITF05_Project1_Group12/. /opt/lampp/htdocs