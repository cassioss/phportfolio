<?php
    
    // Path that keeps XML files inside
    $xml_from_svn = "../resources";

    $svn_repo = "https://subversion.ews.illinois.edu/svn/sp15-cs242/dssntss2";

    print_r(svn_log($svn_repo, null, null, 1, 'SVN_DISCOVER_CHANGED_PATHS'));