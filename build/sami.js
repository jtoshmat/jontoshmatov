
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:app" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="app.html">app</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:app_Http_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="app/Http/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:app_Http_Controllers_Auth" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="app/Http/Controllers/Auth.html">Auth</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:app_Http_Controllers_Auth_AuthController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="app/Http/Controllers/Auth/AuthController.html">AuthController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_Auth_PasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="app/Http/Controllers/Auth/PasswordController.html">PasswordController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:app_Http_Controllers_AdminTestController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/AdminTestController.html">AdminTestController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_AdminToolsController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/AdminToolsController.html">AdminToolsController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_Controller" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/Controller.html">Controller</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_DistrictsController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/DistrictsController.html">DistrictsController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_GroupsController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/GroupsController.html">GroupsController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_MasterController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/MasterController.html">MasterController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_OrganizationsController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/OrganizationsController.html">OrganizationsController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_ProfileController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/ProfileController.html">ProfileController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_RolesController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/RolesController.html">RolesController</a>                    </div>                </li>                            <li data-name="class:app_Http_Controllers_UsersController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/Http/Controllers/UsersController.html">UsersController</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                            <li data-name="namespace:app_cmwn" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="app/cmwn.html">cmwn</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:app_cmwn_Services" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="app/cmwn/Services.html">Services</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:app_cmwn_Services_BulkImporter" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/cmwn/Services/BulkImporter.html">BulkImporter</a>                    </div>                </li>                            <li data-name="class:app_cmwn_Services_ImageManagement" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/cmwn/Services/ImageManagement.html">ImageManagement</a>                    </div>                </li>                            <li data-name="class:app_cmwn_Services_MyMail" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/cmwn/Services/MyMail.html">MyMail</a>                    </div>                </li>                            <li data-name="class:app_cmwn_Services_Notifier" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/cmwn/Services/Notifier.html">Notifier</a>                    </div>                </li>                            <li data-name="class:app_cmwn_Services_Sms" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/cmwn/Services/Sms.html">Sms</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:app_cmwn_Users" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="app/cmwn/Users.html">Users</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:app_cmwn_Users_UserSpecificRepository" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="app/cmwn/Users/UserSpecificRepository.html">UserSpecificRepository</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:app_cmwn_Online" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="app/cmwn/Online.html">Online</a>                    </div>                </li>                            <li data-name="class:app_cmwn_Profile" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="app/cmwn/Profile.html">Profile</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:app_AdminTool" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/AdminTool.html">AdminTool</a>                    </div>                </li>                            <li data-name="class:app_District" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/District.html">District</a>                    </div>                </li>                            <li data-name="class:app_Group" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/Group.html">Group</a>                    </div>                </li>                            <li data-name="class:app_Organization" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/Organization.html">Organization</a>                    </div>                </li>                            <li data-name="class:app_Permission" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/Permission.html">Permission</a>                    </div>                </li>                            <li data-name="class:app_Role" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/Role.html">Role</a>                    </div>                </li>                            <li data-name="class:app_RolePermission" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/RolePermission.html">RolePermission</a>                    </div>                </li>                            <li data-name="class:app_User" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/User.html">User</a>                    </div>                </li>                            <li data-name="class:app_UserRole" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="app/UserRole.html">UserRole</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [

            {"type": "Namespace", "link": "app.html", "name": "app", "doc": "Namespace app"},{"type": "Namespace", "link": "app/Http.html", "name": "app\\Http", "doc": "Namespace app\\Http"},{"type": "Namespace", "link": "app/Http/Controllers.html", "name": "app\\Http\\Controllers", "doc": "Namespace app\\Http\\Controllers"},{"type": "Namespace", "link": "app/Http/Controllers/Auth.html", "name": "app\\Http\\Controllers\\Auth", "doc": "Namespace app\\Http\\Controllers\\Auth"},{"type": "Namespace", "link": "app/cmwn.html", "name": "app\\cmwn", "doc": "Namespace app\\cmwn"},{"type": "Namespace", "link": "app/cmwn/Services.html", "name": "app\\cmwn\\Services", "doc": "Namespace app\\cmwn\\Services"},{"type": "Namespace", "link": "app/cmwn/Users.html", "name": "app\\cmwn\\Users", "doc": "Namespace app\\cmwn\\Users"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/AdminTool.html", "name": "app\\AdminTool", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/District.html", "name": "app\\District", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\District", "fromLink": "app/District.html", "link": "app/District.html#method_organization", "name": "app\\District::organization", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\District", "fromLink": "app/District.html", "link": "app/District.html#method_users", "name": "app\\District::users", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\District", "fromLink": "app/District.html", "link": "app/District.html#method_role", "name": "app\\District::role", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\District", "fromLink": "app/District.html", "link": "app/District.html#method_updateGroups", "name": "app\\District::updateGroups", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/Group.html", "name": "app\\Group", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\Group", "fromLink": "app/Group.html", "link": "app/Group.html#method_users", "name": "app\\Group::users", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Group", "fromLink": "app/Group.html", "link": "app/Group.html#method_students", "name": "app\\Group::students", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Group", "fromLink": "app/Group.html", "link": "app/Group.html#method_teachers", "name": "app\\Group::teachers", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Group", "fromLink": "app/Group.html", "link": "app/Group.html#method_organization", "name": "app\\Group::organization", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Group", "fromLink": "app/Group.html", "link": "app/Group.html#method_updateGroups", "name": "app\\Group::updateGroups", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/Organization.html", "name": "app\\Organization", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\Organization", "fromLink": "app/Organization.html", "link": "app/Organization.html#method_users", "name": "app\\Organization::users", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Organization", "fromLink": "app/Organization.html", "link": "app/Organization.html#method_groups", "name": "app\\Organization::groups", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Organization", "fromLink": "app/Organization.html", "link": "app/Organization.html#method_districts", "name": "app\\Organization::districts", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Organization", "fromLink": "app/Organization.html", "link": "app/Organization.html#method_principals", "name": "app\\Organization::principals", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Organization", "fromLink": "app/Organization.html", "link": "app/Organization.html#method_teachers", "name": "app\\Organization::teachers", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Organization", "fromLink": "app/Organization.html", "link": "app/Organization.html#method_updateGroups", "name": "app\\Organization::updateGroups", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/Permission.html", "name": "app\\Permission", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\Permission", "fromLink": "app/Permission.html", "link": "app/Permission.html#method_permission", "name": "app\\Permission::permission", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\Permission", "fromLink": "app/Permission.html", "link": "app/Permission.html#method_hasPermission", "name": "app\\Permission::hasPermission", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/Role.html", "name": "app\\Role", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\Role", "fromLink": "app/Role.html", "link": "app/Role.html#method_getRole", "name": "app\\Role::getRole", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/RolePermission.html", "name": "app\\RolePermission", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\RolePermission", "fromLink": "app/RolePermission.html", "link": "app/RolePermission.html#method_role", "name": "app\\RolePermission::role", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\RolePermission", "fromLink": "app/RolePermission.html", "link": "app/RolePermission.html#method_permission", "name": "app\\RolePermission::permission", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/User.html", "name": "app\\User", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_role", "name": "app\\User::role", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_districts", "name": "app\\User::districts", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_organizations", "name": "app\\User::organizations", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_groups", "name": "app\\User::groups", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_children", "name": "app\\User::children", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_guardians", "name": "app\\User::guardians", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_friends", "name": "app\\User::friends", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_acceptedfriends", "name": "app\\User::acceptedfriends", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_pendingfriends", "name": "app\\User::pendingfriends", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_friendrequests", "name": "app\\User::friendrequests", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_siblings", "name": "app\\User::siblings", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_hasRole", "name": "app\\User::hasRole", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_updateMember", "name": "app\\User::updateMember", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\User", "fromLink": "app/User.html", "link": "app/User.html#method_deleteMember", "name": "app\\User::deleteMember", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app", "fromLink": "app.html", "link": "app/UserRole.html", "name": "app\\UserRole", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\UserRole", "fromLink": "app/UserRole.html", "link": "app/UserRole.html#method_user", "name": "app\\UserRole::user", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\UserRole", "fromLink": "app/UserRole.html", "link": "app/UserRole.html#method_Role", "name": "app\\UserRole::Role", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app\\cmwn", "fromLink": "app/cmwn.html", "link": "app/cmwn/Online.html", "name": "app\\cmwn\\Online", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\cmwn\\Online", "fromLink": "app/cmwn/Online.html", "link": "app/cmwn/Online.html#method_scopeGuests", "name": "app\\cmwn\\Online::scopeGuests", "doc": "&quot;Returns all the guest users.&quot;"},
                    {"type": "Method", "fromName": "app\\cmwn\\Online", "fromLink": "app/cmwn/Online.html", "link": "app/cmwn/Online.html#method_scopeRegistered", "name": "app\\cmwn\\Online::scopeRegistered", "doc": "&quot;Returns all the registered users.&quot;"},
                    {"type": "Method", "fromName": "app\\cmwn\\Online", "fromLink": "app/cmwn/Online.html", "link": "app/cmwn/Online.html#method_scopeUpdateCurrent", "name": "app\\cmwn\\Online::scopeUpdateCurrent", "doc": "&quot;Updates the session of the current user.&quot;"},
                    {"type": "Method", "fromName": "app\\cmwn\\Online", "fromLink": "app/cmwn/Online.html", "link": "app/cmwn/Online.html#method_user", "name": "app\\cmwn\\Online::user", "doc": "&quot;Returns the user that belongs to this entry.&quot;"},

            {"type": "Class", "fromName": "app\\cmwn", "fromLink": "app/cmwn.html", "link": "app/cmwn/Profile.html", "name": "app\\cmwn\\Profile", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app\\cmwn\\Services", "fromLink": "app/cmwn/Services.html", "link": "app/cmwn/Services/BulkImporter.html", "name": "app\\cmwn\\Services\\BulkImporter", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\cmwn\\Services\\BulkImporter", "fromLink": "app/cmwn/Services/BulkImporter.html", "link": "app/cmwn/Services/BulkImporter.html#method_migratecsv", "name": "app\\cmwn\\Services\\BulkImporter::migratecsv", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\cmwn\\Services\\BulkImporter", "fromLink": "app/cmwn/Services/BulkImporter.html", "link": "app/cmwn/Services/BulkImporter.html#method_csvToArray", "name": "app\\cmwn\\Services\\BulkImporter::csvToArray", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app\\cmwn\\Services", "fromLink": "app/cmwn/Services.html", "link": "app/cmwn/Services/ImageManagement.html", "name": "app\\cmwn\\Services\\ImageManagement", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\cmwn\\Services\\ImageManagement", "fromLink": "app/cmwn/Services/ImageManagement.html", "link": "app/cmwn/Services/ImageManagement.html#method_uploader", "name": "app\\cmwn\\Services\\ImageManagement::uploader", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app\\cmwn\\Services", "fromLink": "app/cmwn/Services.html", "link": "app/cmwn/Services/MyMail.html", "name": "app\\cmwn\\Services\\MyMail", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\cmwn\\Services\\MyMail", "fromLink": "app/cmwn/Services/MyMail.html", "link": "app/cmwn/Services/MyMail.html#method_send", "name": "app\\cmwn\\Services\\MyMail::send", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app\\cmwn\\Services", "fromLink": "app/cmwn/Services.html", "link": "app/cmwn/Services/Notifier.html", "name": "app\\cmwn\\Services\\Notifier", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\cmwn\\Services\\Notifier", "fromLink": "app/cmwn/Services/Notifier.html", "link": "app/cmwn/Services/Notifier.html#method_prepData", "name": "app\\cmwn\\Services\\Notifier::prepData", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\cmwn\\Services\\Notifier", "fromLink": "app/cmwn/Services/Notifier.html", "link": "app/cmwn/Services/Notifier.html#method_send", "name": "app\\cmwn\\Services\\Notifier::send", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\cmwn\\Services\\Notifier", "fromLink": "app/cmwn/Services/Notifier.html", "link": "app/cmwn/Services/Notifier.html#method_attachData", "name": "app\\cmwn\\Services\\Notifier::attachData", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app\\cmwn\\Services", "fromLink": "app/cmwn/Services.html", "link": "app/cmwn/Services/Sms.html", "name": "app\\cmwn\\Services\\Sms", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\cmwn\\Services\\Sms", "fromLink": "app/cmwn/Services/Sms.html", "link": "app/cmwn/Services/Sms.html#method_send", "name": "app\\cmwn\\Services\\Sms::send", "doc": "&quot;\n&quot;"},

            {"type": "Class", "fromName": "app\\cmwn\\Users", "fromLink": "app/cmwn/Users.html", "link": "app/cmwn/Users/UserSpecificRepository.html", "name": "app\\cmwn\\Users\\UserSpecificRepository", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "app\\cmwn\\Users\\UserSpecificRepository", "fromLink": "app/cmwn/Users/UserSpecificRepository.html", "link": "app/cmwn/Users/UserSpecificRepository.html#method___construct", "name": "app\\cmwn\\Users\\UserSpecificRepository::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "app\\cmwn\\Users\\UserSpecificRepository", "fromLink": "app/cmwn/Users/UserSpecificRepository.html", "link": "app/cmwn/Users/UserSpecificRepository.html#method_compose", "name": "app\\cmwn\\Users\\UserSpecificRepository::compose", "doc": "&quot;\n&quot;"},


                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });


        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }



        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });


});


