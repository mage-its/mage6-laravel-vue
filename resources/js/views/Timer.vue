<template>
    <div>
        <ul>
            <li>{{ timerCount }} </li>
            <li>{{ timerHour }} </li>
            <li>{{ timerMinute }} </li>
            <li>{{ timerSecond }} </li>
        </ul>
    </div>    
</template>

<script>
export default {
    name: 'Timer',
    data:() => ({
        timerCount: 3600
    }),    
    watch: {

        timerCount: {
            handler(value) {

                if (value > 0) {
                    setTimeout(() => {    
                        this.timerHour = Math.floor((value % (60 * 60 * 24)) / (60 * 60));
                        this.timerMinute = Math.floor((value % (60 * 60)) / (60));                                           
                        this.timerSecond = Math.floor((value % (60))); 
                        this.timerCount--;                        
                    }, 1000);
                }

            },
            immediate: true // This ensures the watcher is triggered upon creation
        },        

    }    
}
</script>