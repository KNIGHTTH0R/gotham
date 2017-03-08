var socket = io('http://gotham-muldrowja.c9users.io:8081');

new Vue({
    el: '#dashboard',
    data: {
        project_count: null,
    },
    created: function () {
        // socket.on('gotham-updates:gotham\\Events\\RFIUpdated', function (data) {
        //     console.log(data);
        //     //this.users.push(data);
        //     toastr.info('RFI Updated:' + data.rfi.subject);
        // }.bind(this));
       socket.on('gotham-user-'+ uid +':gotham\\Events\\UserAddedToProject' , function(data){
            
            console.log(data);
            this.projectCountChange(data.data.project_count);
            toastr.info(
                '<p style="text-align:center">USER NOTICE:<br />From: System Notifications<br /><br />You have been added to the following project: '+ data.data.project_name +'</p>'
            );
            
            
        }.bind(this));
        
        
    },
    
    methods: {
        projectCountChange: function(newCount){
            this.project_count = newCount;   
        },
        
    }
});
