#!/bin/bash

rsync -av --exclude 'CopyFiles.sh' --exclude 'README.md' --exclude 'LICENSE' /home/em/repos/EITF05_Project1_Group12/. /opt/lampp/htdocs