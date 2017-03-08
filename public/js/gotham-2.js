var socket = io('http://gotham-muldrowja.c9users.io:8081');

new Vue({
    el: '#dashboard',
    data: {
        users: [],
        user_count: null,
         project_count: null,
      
    },
    created: function () {
        
        
        socket.on('gotham-2:gotham\\Events\\UserRegistered' , function(data){
            
            //console.log(data);
            this.userCountChange(data.data.user_count);
            
        }.bind(this));
        
        socket.on('gotham-2:gotham\\Events\\UserDeleted' , function(data){
            
            //console.log(data);
            this.userCountChange(data.data.user[2]);
            
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
            
            console.log(data);
            //this.projectCountChange(data.data.project_count);
            toastr.info(
                'From: System Notifications<br /><br />The following RFI has been updated:<br /><strong><a href="/projects/rfis/' + data.data.rfi.slug +'">'+ data.data.rfi.slug +'</a></strong>', 'USER NOTICE:'
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
        testAlert: function(){
          alert('this is a test');  
        },
        
    }
});
