function [Cost, Energy] = objFunNB(x)
% get cost data from json file 
    jsonText_Cost = fileread("Inputs-json\costs.json");
    jsonData_Cost = jsondecode(jsonText_Cost); % Convert JSON formatted text to MATLAB data types
    jsonDataCostTable = table(jsonData_Cost);

    jsonText_Energy = fileread("Inputs-json\battery.json");
    jsonData_Energy = jsondecode(jsonText_Energy); % Convert JSON formatted text to MATLAB data types
    jsonDataEnergyTable = table(jsonData_Energy);

    x1 = x(1);
    x2 = x(2);
    x3 = x(3);

    c1 = jsonDataCostTable.jsonData_Cost.cost_nb_type_a;
    c2 = jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_a;
    c3 = jsonDataCostTable.jsonData_Cost.cost_nb_type_b;
    c4 = jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_b;
    c5 = jsonDataCostTable.jsonData_Cost.cost_nb_type_c;
    c6 = jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_c;

    capacity1 = jsonDataEnergyTable.jsonData_Energy.battery_capacity_nb_type_a;
    consumption1 = jsonDataEnergyTable.jsonData_Energy.battery_consumption_nb_type_a;
    capacity2 = jsonDataEnergyTable.jsonData_Energy.battery_capacity_nb_type_b;
    consumption2 = jsonDataEnergyTable.jsonData_Energy.battery_consumption_nb_type_b;
    capacity3 = jsonDataEnergyTable.jsonData_Energy.battery_capacity_nb_type_c;
    consumption3 = jsonDataEnergyTable.jsonData_Energy.battery_consumption_nb_type_c;

    cost1 = ( x1 * c1 ) + ( x1 * c2 );
    cost2 = ( x2 * c3 ) + ( x2 * c4 );
    cost3 = ( x3 * c5 ) + ( x3 * c6 );

    batteryLife_1 = capacity1/consumption1;
    batteryLife_2 = capacity2/consumption2;
    batteryLife_3 = capacity3/consumption3;
   
    Cost = cost1 + cost2 + cost3;
    Energy =  (batteryLife_1 + batteryLife_2 + batteryLife_3) / 3;
end