var socket = io('http://gotham-muldrowja.c9users.io:8081');

new Vue({
    el: '#dashboard',
    data: {
        users: [],
        user_count: null,
         project_count: null,
        
    },
    created: function () {
        

        socket.on('gotham-1:gotham\\Events\\UserRegistered' , function(data){
            
            //console.log(data);
            this.userCountChange(data.data.user_count);
            toastr.info(
                'From: System Notifications<br /><br />The following user just registered:<a href="/users/'+ data.data.user.slug +'">'
                + data.data.user.email + '</a>', 'ADMIN NOTICE:'
            );
            
        }.bind(this));
        
        socket.on('gotham-1:gotham\\Events\\UserDeleted' , function(data){
            
            //console.log(data);
            this.userCountChange(data.data.user[2]);
            toastr.info(
                'From: '+ data.data.user[1] +'<br /><br />The following user was deleted:<br /><strong> '
                + data.data.user[0] + '</strong>','ADMIN NOTICE:'
            );
            
            
            
        }.bind(this));
        
        socket.on('gotham-user-'+ uid +':gotham\\Events\\UserAddedToProject' , function(data){
            
            //console.log(data);
            this.projectCountChange(data.data.project_count);
            
            toastr.success(
                'From: System Notifications<br /><br />You have been added to the following project:<br /><strong><a href="/projects/'+ data.data.project.slug +'">' + data.data.project.name +'</a></strong>', 'USER NOTICE:'
            );
            
            
        }.bind(this));
        
        socket.on('gotham-user-'+ uid +':gotham\\Events\\UserRemovedFromProject' , function(data){
            
            //console.log(data);
            this.projectCountChange(data.data.project_count);
            toastr.info(
                'From: System Notifications<br /><br />You have been removed from the following project:<br /><strong>' + data.data.project_name +'</strong>', 'USER NOTICE:'
            );
            
            
        }.bind(this));
        
       socket.on('gotham-user-'+ uid +':gotham\\Events\\RFIAssigned' , function(data){
            
            //console.log(data);
            //this.projectCountChange(data.data.project_count);
            toastr.info(
                'From: System Notifications<br /><br />You have been assigned following RFI:<br /><strong><a href="/projects/rfis/' + data.data.rfi.slug +'">'+ data.data.rfi.slug +'</a></strong>', 'USER NOTICE:'
            );
            
            
        }.bind(this));
        
        socket.on('gotham-user-'+ uid +':gotham\\Events\\RFIUpdated' , function(data){
            
            //console.log(data);
            //this.projectCountChange(data.data.project_count);
            toastr.info(
                'From: System Notifications<br /><br />The following RFI has been updated:<br /><strong><a href="/projects/rfis/' + data.data.rfi.slug +'">'+ data.data.rfi.slug +'</a></strong>', 'USER NOTICE:'
            );
            
            
        }.bind(this));
        
        socket.on('gotham-1:gotham\\Events\\ProjectCreated' , function(data){
            
            //console.log(data);
            //this.projectCountChange(data.data.project_count);
            toastr.info(
                'From: '+  data.data.createdby.email  +'<br /><br />The following Project has been created:<br /><strong><a href="/projects/' + data.data.project.slug +'">'+ data.data.project.slug +'</a></strong>', 'USER NOTICE:'
            );
            
        }.bind(this));
        
        
        
    },
    
    methods: {
        userCountChange: function(newCount){
            this.user_count = newCount;   
        },
        projectCountChange: function(newCount){
            this.project_count = newCount;   
        },
        
    }
});
