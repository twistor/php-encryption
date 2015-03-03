#!/bin/bash

if php tests/safe_exceptions.php $1 2>/dev/null | grep -q '^#0.*Crypto::InitializeSafeExceptions'; then
    exit 0
else
    exit 1
fi
