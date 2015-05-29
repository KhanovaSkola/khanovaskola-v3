#!/bin/bash

out "Building frontend"
(cd $TARGET && gulp production)
